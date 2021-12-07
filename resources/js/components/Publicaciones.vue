<!--Seccion de HTML-->
<template>  
    <div>                
        <div class="modal" :class = "{mostrar:modal}">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <!--Variable dinamica para el cambio del titulo del modal dependiendo el tipo de publicacion a realizar-->
                <h4 class="modal-title">{{tituloModal}}</h4>
                <!--Boton en la esquina superior derecha que permite cerrar el modal-->
                <button @click="tipoPublicacion = true; cerrarModal();" type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Cuerpo del modal, el cual contiene un campo para escribir el mensaje, asi como de seleccionar una imagen opcional -->
            <div class="modal-body">
                <!--Enalce del campo y objeto con v-model-->
                <input v-model="publicacion.textoPublicacion" type="text" class="form-control" placeholder="Ingresa aqui el texto de la publicacion..." id="texto"><br>
                <label for="img" style="color: blue;">Añadir foto/imagen: </label>                                    
                <input type="file" style= "color: blue;" accept="png,jpg" id = "imgSeleccionada">
            </div>
            <!-- Modal footer que contiene dos botones, uno para cerrar el modal y el otro para realizar la publicacion-->
            <div class="modal-footer">
                <button @click="cerrarModal();" type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button @click="publicar();" type="button" class="btn btn-primary" data-dismiss="modal">Publicar</button>
            </div>
            </div>
        </div>
        </div>
        <table>   
            <thead>
                <!--Seccion que contiene los elementos fijos en donde puede pulsar el boton para realizar una publicacion-->
                <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <b><div style="color: blue; font-size: 20px;" class="card-header">¿En que estas pensando?: </div></b>
                            <div class="card-body">
                                <!--Boton que ejecuta la funcion para abrir el modal de modo que el titulo diga que se realizara una publicacion-->
                                <center><button @click="tipoPublicacion=true;abrirModal();" type="button" class="btn btn-primary">¡ Pulsa aqui para publicar un estado !</button></center>                                
                            </div>                    
                        </div>
                    </div>            
                </div>
            </thead>     
            <tbody v-for="publicacion in publicaciones" :key="publicacion.id">  
                <!--Ciclo que imprime todas las publicaciones existentes en una tabla-->  
                <tr><td colspan="2">
                    <label style="width: 855px;">Publicacion de: </label>                    
                    <label class="text-center">{{publicacion.created_at}}</label>
                </td></tr>            
                <tr style="width: 700px;" class="text-center">{{publicacion.imagenPublicacion}}</tr>            
                <tr style="width: 700px;" class="text-center">{{publicacion.textoPublicacion}}</tr>            
                <tr>
                    <center>
                        <td><button @click="tipoPublicacion=false; abrirModal(publicacion);" class="btn btn-primary">Hacer un comentario</button></td>    
                    </center>  
                </tr>                        
                <hr><br>
                <table>
                    <tbody>
                        <!--Seccion de los comentarios pertenecientes a cada publicacion-->
                        <tr><label style="color: blue;" >Comentarios:</label></tr>                    
                        <tr v-for="comentario in comentarios" :key="comentario.id" style="height: 80px;">                                    
                            <td>{{comentario.textoComentario}}</td>
                            <td style="width: 30px;">{{comentario.created_at}}</td>                                                        
                            <td><button @click="eliminar(comentario.id);" class="btn btn-danger">Eliminar</button></td>                                                                                                
                        </tr>                         
                    </tbody>
                    <hr>
                </table>                             
            </tbody>
        </table>
    </div>      
</template>
<!--Seccion de la logica con JavaScript-->
<script>
export default {
    data(){
        return{
            //Objeto de tipo publicacion
            publicacion:{                
                textoPublicacion: ''                               
            },                
            //Variable booleana para cambiar el titulo al Modal
            tipoPublicacion:true,
            modal: 0,
            tituloModal:'', 
            //Arreglo de los registros de publicaciones
            publicaciones:[],
            //Arreglo de comentarios existentes en la BD
            comentarios:[],
        }
    },
    methods: {
        async listar(){
            const pub = await axios.get('/publicacion');
            this.publicaciones = pub.data;

            const com = await axios.get('/comentario');
            this.comentarios = com.data;            
        },             
        async eliminar(id){
            const eliminar = await axios.delete('/comentario/'+id);
            this.listar();
        },  
        async publicar(){
            if(this.tipoPublicacion){
                const pub = await axios.post('/publicacion', this.publicacion);
            }else{
                const com = await axios.post('/comentario', this.comentario);
            }
            this.cerrarModal();
            this.listar();
        },
        abrirModal(data={}){
            this.modal=1;
            //Desicion de colocacion de titulo a modal dependiendo el boton que fue pulsado
            if(this.tipoPublicacion){
                //Al pulsar el boton para publicar un estado
                this.tituloModal="Publicar estado";
            }else{
                //Titulo que se asina al modal al pulsar el boton de 'comentar'
                this.tituloModal="Realizar comentario";
            }
        },
        cerrarModal(){
            this.modal=0;
        },
    },
    created(){
        this.listar();
    }    
}
</script>
<!--Seccion de estilos con CSS-->
<style>
.mostrar{
    display: list-item;
    opacity: 1;
    background: rgb(21, 84, 255);
}
</style>
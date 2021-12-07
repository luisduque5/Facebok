<!--Seccion de HTML-->
<template>    
    <table>        
        <tbody v-for="publicacion in publicaciones" :key="publicacion.id">            
            <td></td>
            <tr style="width: 700px;" class="text-center">{{publicacion.id}}</tr>
            <tr style="width: 700px;" class="text-center">{{publicacion.imagenPublicacion}}</tr>            
            <tr style="width: 700px;" class="text-center">{{publicacion.textoPublicacion}}</tr>
            <tr style="width: 700px;" class="text-center">Publicado el: {{publicacion.created_at}}</tr>                                     
            <tr>
                <td colspan="3">
                    <input type="text" style="width: 985px;" id="comentar">
                    <button type="button" style="width: 87px;" class="btn btn-primary">Comentar</button>                    
                </td>
            </tr>            
            <br>
            <hr><br>
            <table>
                <tbody>
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
</template>
<!--Seccion de la logica con JavaScript-->
<script>
export default {
    data(){
        return{
            publicaciones:[],
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
        }   
    },
    created(){
        this.listar();
    }    
}
</script>
<!--Seccion de estilos con CSS-->
<style>

</style>
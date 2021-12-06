<!--Seccion de HTML-->
<template>    
    <table>        
        <tbody v-for="publicacion in publicaciones" :key="publicacion.id">            
            <tr style="width: 700px;" class="text-center">{{publicacion.id}}</tr>
            <tr style="width: 700px;" class="text-center">{{publicacion.imagenPublicacion}}</tr>
            <tr style="width: 700px;" class="text-center">{{publicacion.textoPublicacion}}</tr>
            <tr style="width: 700px;" class="text-center">Publicado el: {{publicacion.created_at}}</tr>  
            <br>
            <center><button @click="espacio" type="button" class="btn btn-primary">Comentar</button></center>
            <br>
            <tr class="text-center" id= "cuadro"><input type="text" style="width: 700px;" id="comentar"></tr>
            <br>
        </tbody>
    </table>
</template>
<!--Seccion de la logica con JavaScript-->
<script>
export default {
    data(){
        return{
            publicaciones:[],
        }
    },
    methods: {
        async listar(){
            const res = await axios.get('publicacion');
            this.publicaciones = res.data;
        },
        async espacio(){            

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
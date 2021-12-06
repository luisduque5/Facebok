<!--Seccion de HTML-->
<template>    
    <table class="table table-striped">        
        <tbody v-for="publicacion in publicaciones" :key="publicacion.id">            
            <tr style="width: 700px;" class="text-center">{{publicacion.id}}</tr>
            <tr style="width: 700px;" class="text-center">{{publicacion.imagenPublicacion}}</tr>
            <tr style="width: 700px;" class="text-center">{{publicacion.textoPublicacion}}</tr>
            <tr style="width: 700px;" class="text-center">Publicado el: {{publicacion.created_at}}</tr>            
            <tr class="text-center"><input type="text" style="width: 700px;"></tr>
            <tr class="text-center"><button class="btn-info">Comentar</button></tr><br>            
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
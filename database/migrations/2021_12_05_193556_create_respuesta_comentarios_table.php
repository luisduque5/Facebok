<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestaComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta_comentarios', function (Blueprint $table) {
            $table->id('id');//Campo que almacena el ID de cada respuesta de un comentario
            $table->text('textoRespuesta');//Campo que almacena el texto de la respuesta compartida
            $table->timestamps();//Campo que permite recupear fecha y hora de creacion o modificacion del registro
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuesta_comentarios');//Metodo que elimina la tabla si existiera
    }
}

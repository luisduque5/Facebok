<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id('idComentario');//Campo que almacena los IDs de cada comentario
            $table->text('textoComentario');//Campo que almacena el texto del comentario
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
        Schema::dropIfExists('comentarios');//Metodo que elimina la tabla si existiera
    }
}

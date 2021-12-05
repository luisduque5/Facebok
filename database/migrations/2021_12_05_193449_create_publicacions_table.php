<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacions', function (Blueprint $table) {
            $table->id('id');//Campo que almacena los IDs de cada publicacion
            $table->text('imagenPublicacion');//Campo que almacena la ruta de la imagen que se publico
            $table->text('textoPublicacion');//Campo que almacena el texto que acompaña la publicacion
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
        Schema::dropIfExists('publicacions');//Metodo que elimina la tabla si existiera
    }
}

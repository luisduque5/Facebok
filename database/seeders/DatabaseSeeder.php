<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Se indica la ejecucion de los factories con la cantidad de registros que se desean crear
        \App\Models\Publicacion::factory(10)->create();
        \App\Models\Comentario::factory(10)->create();
        \App\Models\RespuestaComentario::factory(10)->create();
    }
}

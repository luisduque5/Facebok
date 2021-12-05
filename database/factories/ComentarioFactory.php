<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //Se indica el campo que se desea rellenar con datos de prueba
            'textoComentario'=>$this->faker->paragraph()
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RespuestaComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'textoRespuesta'=>$this->faker->paragraph()
        ];
    }
}

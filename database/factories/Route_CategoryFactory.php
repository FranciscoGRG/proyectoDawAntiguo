<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Route_CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    /* Esta funcion crea categorias para las rutas fake */
    public function definition()
    {
        return [
            'name' => $this->faker->text(10)
        ];
    }
}

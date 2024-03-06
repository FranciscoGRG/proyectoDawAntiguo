<?php

namespace Database\Factories;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Factories\Factory;

class Offer_CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    /* Esta funcion crea nombres de categorias para las ofertas fake */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence()
        ];
    }
}



<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Image;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Image::class;

    /* Esta funcion crea imagenes fake */
    public function definition()
    {
        return [
            'url' => 'images/' . $this->faker->image('public/storage/images', 640, 480, null, false)
        ];
    }
}

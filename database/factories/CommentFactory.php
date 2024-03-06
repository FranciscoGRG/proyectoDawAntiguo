<?php

namespace Database\Factories;

use App\Models\Route;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /* Esta funcion crea un comentario con datos fake */
    public function definition()
    {
        return [
            'message' => $this->faker->text(100),
            'route_id' => Route::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];
    }
}

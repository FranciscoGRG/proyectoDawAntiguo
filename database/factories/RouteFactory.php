<?php

namespace Database\Factories;

use App\Models\Route;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Route_Category;

class RouteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Route::class;

    /* Esta funcion crea rutas fake */
    public function definition()
    {
        $title = $this->faker->unique()->sentence();

        return [
            'title' => $title,
            'description' => $this->faker->text(1000),
            'distance' => $this->faker->randomNumber(),
            'unevenness' => $this->faker->randomNumber(),
            'difficulty' => $this->faker->randomElement(['Dificil', 'Normal', 'Facil']),
            'mapsIFrame' => $this->faker->sentence(),
            'location' => $this->faker->sentence(),
            'slug' => Str::slug($title),
            'user_id' => User::all()->random()->id,
            'category_id' => Route_Category::all()->random()->id,
        ];
    }
}

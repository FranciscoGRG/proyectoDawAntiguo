<?php

namespace Database\Factories;

use App\Models\Offer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Offer_Category;

class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Offer::class;

    /* Esta funcion crea ofertas fake */
    public function definition()
    {
        $name = $this->faker->sentence();

        return [
            'name' => $name,
            'description' => $this->faker->sentence(),
            'price' =>$this->faker->randomNumber(),
            'slug' => Str::slug($name),
            'user_id' => User::all()->random()->id,
            'category_id' => Offer_Category::all()->random()->id,
        ];
    }
}

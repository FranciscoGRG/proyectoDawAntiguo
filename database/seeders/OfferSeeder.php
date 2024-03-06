<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Offer;
use Illuminate\Database\Seeder;
use App\Models\Image;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /* Esta funcion crea ofertas en la aplicacion */
    public function run()
    {
        $offers = Offer::factory(20)->create();

        foreach ($offers as $offer){
            Image::factory(1)->create([
                'imageable_id' => $offer->id,
                'imageable_type' => Offer::class
            ]);
        }
    }
}

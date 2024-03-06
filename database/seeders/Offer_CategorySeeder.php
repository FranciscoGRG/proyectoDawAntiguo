<?php

namespace Database\Seeders;

use App\Models\Offer;
use App\Models\Offer_Category;
use Illuminate\Database\Seeder;

class Offer_CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /* Esta funcion crea categorias para las ofertas en la aplicacion */
    public function run()
    {
        /* Offer_Category::factory(20)->create(); */

        Offer_Category::create([
            'name' => 'Cadena',
        ]);

        Offer_Category::create([
            'name' => 'Platos',
        ]);

        Offer_Category::create([
            'name' => 'Pedales',
        ]);

        Offer_Category::create([
            'name' => 'Camaras',
        ]);

        Offer_Category::create([
            'name' => 'Radios',
        ]);

        Offer_Category::create([
            'name' => 'Horquilla',
        ]);

        Offer_Category::create([
            'name' => 'Manillar',
        ]);

        Offer_Category::create([
            'name' => 'Potencia',
        ]);

        Offer_Category::create([
            'name' => 'Frenos',
        ]);

        Offer_Category::create([
            'name' => 'Tija',
        ]);

        Offer_Category::create([
            'name' => 'Sillin',
        ]);

        Offer_Category::create([
            'name' => 'Llanta',
        ]);

        Offer_Category::create([
            'name' => 'Piñones',
        ]);

        Offer_Category::create([
            'name' => 'Cubiertas',
        ]);
    }
}

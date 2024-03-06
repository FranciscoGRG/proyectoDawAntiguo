<?php

namespace Database\Seeders;

use App\Models\Route_Category;
use Illuminate\Database\Seeder;

class Route_CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /* Esta funcion crea categorias para las rutas en la aplicacion */
    public function run()
    {

        Route_Category::create([
            'name' => 'Carretera',
        ]);

        Route_Category::create([
            'name' => 'Montaña',
        ]);

        Route_Category::create([
            'name' => 'Trial',
        ]);

        Route_Category::create([
            'name' => 'Cicloturismo',
        ]);
        
        /* Route_Category::factory(9)->create(); */
    }
}

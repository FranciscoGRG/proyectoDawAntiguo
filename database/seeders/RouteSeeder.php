<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use App\Models\Route;
use Illuminate\Database\Seeder;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /* Esta funcion crea rutas en la aplicacion */
    public function run()
    {
       $routes = Route::factory(20)->create();

       foreach($routes as $route){
           Image::factory(1)->create([
               'imageable_id' => $route->id,
               'imageable_type' => Route::class
           ]);
       }
    }
}

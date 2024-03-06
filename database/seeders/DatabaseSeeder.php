<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    /* Esta funcion ejecuta todos los seeders creados */
    public function run()
    {
        Storage::deleteDirectory('images');
        Storage::makeDirectory('images');

        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);
    
        $this->call(Offer_CategorySeeder::class);
        $this->call(Route_CategorySeeder::class);
        $this->call(RouteSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(OfferSeeder::class);
        
    }
}

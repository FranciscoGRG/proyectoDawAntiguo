<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /* Esta funcion crea usuarios */ 
    public function run()
    {
        User::create([
            'first_name' => 'Fran',
            'last_name' => 'Garcia Rodriguez',
            'email' => 'fran@gmail.com',
            'phone' => '622 78 42 74',
            'password' => bcrypt('mariscal')
        ])->assignRole('Admin');

        $users = User::factory(20)->create();

        foreach ($users as $user){
            Image::factory(1)->create([
                'imageable_id' => $user->id,
                'imageable_type' => User::class
            ]);
        }
        
    }
}

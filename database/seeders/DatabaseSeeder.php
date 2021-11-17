<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(MarcasTableSeeder::class);
        $this->call(ProductosTableSeeder::class);

        User::create([
            'name'=>'Admin',
            'email'=>'admin.admin@admin.admin',
            'password'=>Hash::make('123456789'),
            'utype'=>'ADM'
        ]);

        User::create([
            'name'=>'Diego',
            'email'=>'diego15@gmail.com',
            'password'=>Hash::make('123456789')
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Seeder;

class MarcasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marca::create([
            'nombre' => 'Nike',
            'logo' => 'Nike-Logo.png',
        ]);

        Marca::create([
            'nombre' => 'Adidas',
            'logo' => 'Nike-Logo.png',
        ]);

        Marca::create([
            'nombre' => 'Zara',
            'logo' => 'Nike-Logo.png',
        ]);

        Marca::create([
            'nombre' => 'H&M',
            'logo' => 'Nike-Logo.png',
        ]);

        Marca::create([
            'nombre' => 'C&A',
            'logo' => 'Nike-Logo.png',
        ]);
    }
}

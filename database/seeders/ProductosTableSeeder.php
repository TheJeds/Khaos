<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::factory(20)->create();
        /*Producto::create([
            'nombre' => 'Playera',
            'precio' => '50',
            'cantidad' => '12',
            'tipo' => 'Ropa',
            'imagen' => 'product-1.jpg',
        ]);

        Producto::create([
            'nombre' => 'Pantalon',
            'precio' => '150',
            'cantidad' => '8',
            'tipo' => 'Ropa',
            'imagen' => 'product-1.jpg',
        ]);

        Producto::create([
            'nombre' => 'Tenis',
            'precio' => '40',
            'cantidad' => '23',
            'tipo' => 'Tenis',
            'imagen' => 'product-1.jpg',
        ]);

        Producto::create([
            'nombre' => 'Anillo',
            'precio' => '23',
            'cantidad' => '8',
            'tipo' => 'Accesorio',
            'imagen' => 'product-1.jpg',
        ]);

        Producto::create([
            'nombre' => 'Pulsera',
            'precio' => '12',
            'cantidad' => '40',
            'tipo' => 'Accesorio',
            'imagen' => 'product-1.jpg',
        ]); */
    }
}

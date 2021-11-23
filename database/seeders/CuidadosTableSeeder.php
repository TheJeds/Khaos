<?php

namespace Database\Seeders;

use App\Models\Cuidado;
use Illuminate\Database\Seeder;

class CuidadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        Cuidado::create([
            'nombre_cuidado'=>'Lavado en frio',
            'descripcion' => 'lavadora'
        ]);
        Cuidado::create([
            'nombre_cuidado'=>'Lavado en tibio',
            'descripcion' => 'lavadora'
        ]);
        Cuidado::create([
            'nombre_cuidado'=>'Lavado en caliente',
            'descripcion' => 'lavadora'
        ]);
        Cuidado::create([
            'nombre_cuidado'=>'No planchar',
            'descripcion' => 'plancha'
        ]);
        Cuidado::create([
            'nombre_cuidado'=>'No lavar con agua',
            'descripcion' => 'no agua'
        ]);
        Cuidado::create([
            'nombre_cuidado'=>'Temperatura +25 grados',
            'descripcion' => 'agua'
        ]);
        Cuidado::create([
            'nombre_cuidado'=>'No planchar con vapor',
            'descripcion' => 'plancha'
        ]);
        Cuidado::create([
            'nombre_cuidado'=>'No cloro',
            'descripcion' => 'productos'
        ]);
        Cuidado::create([
            'nombre_cuidado'=>'No usar secadora',
            'descripcion' => 'secadora'
        ]);
        Cuidado::create([
            'nombre_cuidado'=>'No usar ningun producto',
            'descripcion' => 'producto'
        ]);
    }
}

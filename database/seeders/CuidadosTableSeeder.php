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
            'nombre_cuidado'=>'Lavado en frio'
        ]);
        Cuidado::create([
            'nombre_cuidado'=>'Lavado en tibio'
        ]);
        Cuidado::create([
            'nombre_cuidado'=>'Lavado en caliente'
        ]);
        Cuidado::create([
            'nombre_cuidado'=>'No planchar'
        ]);
        Cuidado::create([
            'nombre_cuidado'=>'No lavar con agua'
        ]);
        Cuidado::create([
            'nombre_cuidado'=>'Temperatura +25 grados'
        ]);
        Cuidado::create([
            'nombre_cuidado'=>'No planchar con vapor'
        ]);
        Cuidado::create([
            'nombre_cuidado'=>'No cloro'
        ]);
        Cuidado::create([
            'nombre_cuidado'=>'No usar secadora'
        ]);
        Cuidado::create([
            'nombre_cuidado'=>'No usar ningun producto'
        ]);
    }
}

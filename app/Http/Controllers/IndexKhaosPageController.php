<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class IndexKhaosPageController extends Controller
{
    public function index()
    {
        $productos = Producto::inRandomOrder()->take(4)->get();
        
        return view('khaos/index_khaos')->with('productos', $productos);
    }
}

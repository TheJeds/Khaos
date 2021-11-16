<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('khaos/producto_index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('khaos/producto_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagen = $request->nombre .'_'. $request->id . '.' . $request->imagen_path->extension();
        $request->imagen_path->move(public_path('imagenes'), $imagen);
        $request->merge([
            'imagen'=>$imagen
        ]);

        $producto = Producto::create($request->all());
        return redirect()->route('producto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('khaos/producto_show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('khaos/producto_edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {   
        if($request->imagen_path != ''){
            $imagen_anterior = "imagenes/" . $producto->imagen;
            if(File::exists($imagen_anterior)){
                File::delete($imagen_anterior);
            }
        

            $imagen = $request->nombre .'_'. $request->id . '.' . $request->imagen_path->extension();
            $request->imagen_path->move(public_path('/imagenes'), $imagen);

            $request->merge([
                'imagen' => $imagen,
            ]);
        }
        Producto::where('id', $producto->id)->update($request->except('_token', '_method', 'imagen_path'));
        return redirect()->route('producto.show', $producto)->with('msg', 'Producto editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $imagen_anterior = "imagenes/" . $producto->imagen;
        if(File::exists($imagen_anterior)){
            File::delete($imagen_anterior);
        }
        $producto->delete();
        return redirect()->route('producto.index')->with('msg', 'Producto eliminado');
    }
}

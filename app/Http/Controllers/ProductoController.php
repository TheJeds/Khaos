<?php

namespace App\Http\Controllers;

use App\Models\Cuidado;
use App\Models\Marca;
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
    public function __construct()
    {
        $this->middleware('auth')->except("index", 'show');
    }

    public function index()
    {
        $productos = Producto::all();
        $marcas = Marca::all();
        return view('khaos/producto_index', compact('productos', 'marcas'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::all();
        $cuidados = Cuidado::all();
        return view('khaos/producto_create', compact('marcas', 'cuidados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'precio' => 'required|numeric',
            'cantidad' => 'required|numeric',
            'tipo' => 'max:15',
            'imagen_path' => 'required|image'
        ]); 

        $imagen = $request->nombre .'_'. time() . '.' . $request->imagen_path->extension();
        $request->imagen_path->move(public_path('imagenes'), $imagen);
        $request->merge([
            'imagen'=>$imagen
        ]);

        $producto = Producto::create($request->all());
        $producto->cuidados()->attach($request->cuidado_id);
        return redirect()->route('producto.index')->with('success_message', 'Producto Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        $comentarios = $producto->comentarios;
        return view('khaos/producto_show', compact('producto', 'comentarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $cuidados = Cuidado::all();
        return view('khaos/producto_edit', compact('producto', 'cuidados'));
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

        $request->validate([
            'nombre' => 'required|max:50',
            'precio' => 'required|numeric',
            'cantidad' => 'required|numeric',
            'tipo' => 'max:15',
        ]);

        if($request->imagen_path != ''){
            $imagen_anterior = "imagenes/" . $producto->imagen;
            if(File::exists($imagen_anterior)){
                File::delete($imagen_anterior);
            }
        

            $imagen = $request->nombre .'_'. time() . '.' . $request->imagen_path->extension();
            $request->imagen_path->move(public_path('/imagenes'), $imagen);

            $request->merge([
                'imagen' => $imagen,
            ]);
        }
        Producto::where('id', $producto->id)->update($request->except('_token', '_method', 'imagen_path', 'cuidado_id'));
        $producto->cuidados()->sync($request->cuidado_id);
        return redirect()->route('producto.show', $producto)->with('success_message', 'Producto editado');
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
        return redirect()->route('producto.index')->with('success_message', 'Producto eliminado');
    }
}

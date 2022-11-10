<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaProductos = \App\Models\Producto::all();
        return view('productos.index',compact('listaProductos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        $producto = new \App\Models\Producto();
        $producto->fill($request->all());
        $producto->save();
        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objProducto = \App\Models\Producto::find($id);
        return view('productos.form', compact('objProducto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $objProducto = \App\Models\Producto::find($id);
        if ($objProducto == null) {
            return redirect()->route('productos.index');
        }
        $validated = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        $objProducto->fill($request->all());
        $objProducto->save();
        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objProducto = \App\Models\Producto::find($id);
        if ($objProducto == null) {
            return redirect()->route('productos.index');
        }
        $objProducto->delete();
        return redirect()->route('productos.index');
    }
    public function search(Request $request)
    {
        $search = $request->get('q');
        $listaProductos = \App\Models\Producto::where('nombre', 'like', '%' . $search . '%')->orWhere('precio','like', '%' . $search . '%')->get();
        return view('productos.index', compact('listaProductos', 'search'));
    }

    public function foto($id)
    {
        $objProducto = \App\Models\Producto::find($id);
        if($objProducto == null){
            return redirect()->route('productos.index');
        }
        return view('productos.foto', compact('objProducto'));
    }

    public function postFoto(Request $request, $id)
    {
        $objProducto = \App\Models\Producto::find($id);
        if($objProducto == null){
            return redirect()->route('productos.index');
        }
        $validated = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        $file     = $request->file("foto");
        $uuidName = Str::uuid()->toString();
        $name     = "$uuidName.".$file->getClientOriginalExtension();
        $file->move(public_path("images"), $name);
        $objProducto->imagen = $name;
        $objProducto->save();

        return redirect()->route('productos.index');
    }
}

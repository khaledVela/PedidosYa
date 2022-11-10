<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\CategoriaProducto;
use Illuminate\Http\Request;

class CategoriaProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaCategoriasProductos = CategoriaProducto::all();
        return view('categoriasproductos.index', compact('listaCategoriasProductos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaCategorias= Categoria::all();
        $listaProductos= Producto::all();
        return view('categoriasproductos.form', compact('listaCategorias', 'listaProductos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'categoria_id' => 'required',
            'producto_id' => 'required',
        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        $categoriaProducto = new CategoriaProducto();
        $categoriaProducto->fill($request->all());
        $categoriaProducto->save();
        return redirect()->route('categoriasproductos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\CategoriaProducto $categoriaProducto
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriaProducto $categoriaProducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\CategoriaProducto $categoriaProducto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listaCategorias= Categoria::all();
        $listaProductos= Producto::all();
        $objCategoriaProducto = CategoriaProducto::find($id);
        return view('categoriasproductos.form', compact('objCategoriaProducto', 'listaCategorias', 'listaProductos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CategoriaProducto $categoriaProducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoriaProducto = CategoriaProducto::find($id);
        if ($categoriaProducto == null) {
            return redirect()->route('categoriasproductos.index');
        }
        $validated = $request->validate([
            'categoria_id' => 'required',
            'producto_id' => 'required',
        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        $categoriaProducto->fill($request->all());
        $categoriaProducto->save();
        return redirect()->route('categoriasproductos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CategoriaProducto $categoriaProducto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoriaProducto = CategoriaProducto::find($id);
        if ($categoriaProducto == null) {
            return redirect()->route('categoriasproductos.index');
        }
        $categoriaProducto->delete();
        return redirect()->route('categoriasproductos.index');
    }

    public function search(Request $request)
    {
        $search = $request->get("q");
        $listaCategoriasProductos = CategoriaProducto::where("categoria_id", "like", "%" . $search . "%")->orWhere("producto_id", "like", "%" . $search . "%")->get();
        return view('categoriasproductos.index', compact('listaCategoriasProductos', 'search'));
    }
}

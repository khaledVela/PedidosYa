<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $listaCategorias = \App\Models\Categoria::all();
        return view('categorias.index',compact('listaCategorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('categorias.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|unique:categorias|max:255',
        ]);
        if(! $validated){
            return redirect()->back()->withErrors($validated);
        }
        $categoria = new \App\Models\Categoria();
        $categoria->fill($request->all());
        $categoria->save();
        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $objCategoria = \App\Models\Categoria::find($id);
        return view('categorias.form', compact('objCategoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $categoria = \App\Models\Categoria::find($id);
        if ($categoria==null) {
            return redirect()->route('categorias.index');
        }
        $categoria->fill($request->all());
        $categoria->save();
        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $categoria = \App\Models\Categoria::find($id);
        if ($categoria==null) {
            return redirect()->route('categorias.index');
        }
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
    public function search(Request $request){
        $search = $request->get("q");
        $listaCategorias = \App\Models\Categoria::where('nombre','like',"%$search%")->get();
        return view("categorias.index",compact("listaCategorias","search"));
    }
}

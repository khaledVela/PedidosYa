<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use App\Models\User;

use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaVentas = Venta::all();
        return view('ventas.index', compact('listaVentas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaProductos = Producto::all();
        $listaUsuarios = User::all();
        return view('ventas.form', compact('listaProductos', 'listaUsuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $venta = new Venta();
        $venta->fill($request->all());
        $venta->save();
        return redirect()->route('ventas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listaProductos = Producto::all();
        $listaUsuarios = User::all();
        $objVenta = Venta::find($id);
        return view('ventas.form', compact('objVenta', 'listaProductos', 'listaUsuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $venta = Venta::find($id);
        if ($venta == null) {
            return redirect()->route('ventas.index');
        }
        $validated = $request->validate([
            'cantidad' => 'required',
            'precio_venta' => 'required',
            'precio_total' => 'required',
            'producto_id' => 'required',
            'user_id' => 'required',
        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        $venta->fill($request->all());
        $venta->save();
        return redirect()->route('ventas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venta = Venta::find($id);
        if ($venta == null) {
            return redirect()->route('ventas.index');
        }
        $venta->delete();
        return redirect()->route('ventas.index');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $listaVentas = Venta::Where('producto_id', 'like', '%' . $search . '%')
            ->orWhere('user_id', 'like', '%' . $search . '%')
            ->get();
        return view('ventas.index', compact('listaVentas'));
    }
}

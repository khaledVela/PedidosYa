<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class generalController extends Controller
{
    public function productosPorCategoria($id)
    {
        $categoria=$id;
        $listaProductos = \App\Models\CategoriaProducto::where('categoria_id',$id)->get();
        $listaProductosId = [];
        foreach ($listaProductos as $producto) {
            $listaProductosId[] = Producto::find($producto->producto_id);
        }
        return view('generales.productos',compact('listaProductosId','categoria'));
    }
    public function search(Request $request)
    {
        $categoria=$request->get('categoria');
        $search = $request->get('q');
        $listaProductos = \App\Models\CategoriaProducto::where('categoria_id',$categoria)->get();
        $listaProducto = [];
        $listaProductosId = [];
        foreach ($listaProductos as $producto) {
            $listaProducto[] = Producto::find($producto->producto_id);
        }
        foreach ($listaProducto as $productos) {
            if($productos->nombre == $search){
                $listaProductosId[] = $productos;
            }
        }
        return view('generales.productos', compact('listaProductosId', 'search','categoria'));
    }

    public function search2(Request $request)
    {
        $search = $request->get('q');
        $listaProductos = \App\Models\Producto::where('nombre', 'like', '%' . $search . '%')->get();
        return view('home', compact('listaProductos', 'search'));
    }

    public function ventasPorProducto($id)
    {
        $usuario = auth()->user()->id;
        $producto=Producto::find($id);
        return view('generales.ventas',compact("producto","usuario"));
    }
    public function vendido(Request $request)
    {
        $validated = $request->validate([
            'cantidad' => 'required',
            'precio_venta' => 'required',
            'precio_total' => 'required',
            'producto_id' => 'required',
            'usuario_id' => 'required',
        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }
        $producto = Producto::find($request->producto_id);
        $producto->stock = $producto->stock - $request->cantidad;
        $producto->save();
        $venta = new \App\Models\Venta();
        $venta->fill($request->all());
        $venta->save();
        $listaCategorias = \App\Models\Categoria::all();
        return redirect()->route('home',compact('listaCategorias'));
    }
}

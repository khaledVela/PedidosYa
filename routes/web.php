<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $listaCategorias = \App\Models\Categoria::all();
    return view('home',compact('listaCategorias'));
});
Route::get('/categorias',[\App\Http\Controllers\CategoriaController::class,'index']) -> name('categorias.index');
Route::get('/categorias/create',[\App\Http\Controllers\CategoriaController::class,'create']) -> name('categorias.create');
Route::post('/categorias',[\App\Http\Controllers\CategoriaController::class,'store']) -> name('categorias.store');
Route::get('/categorias/{id}',[\App\Http\Controllers\CategoriaController::class,'edit']) -> name('categorias.edit');
Route::post('/categorias/search',[\App\Http\Controllers\CategoriaController::class,'search']) -> name('categorias.search');
Route::post('/categorias/{id}',[\App\Http\Controllers\CategoriaController::class,'update']) -> name('categorias.update');
Route::post('/categorias/{id}/delete',[\App\Http\Controllers\CategoriaController::class,'destroy']) -> name('categorias.destroy');

Route::get('/categoriasproductos',[\App\Http\Controllers\CategoriaProductoController::class,'index']) -> name('categoriasproductos.index');
Route::get('/categoriasproductos/create',[\App\Http\Controllers\CategoriaProductoController::class,'create']) -> name('categoriasproductos.create');
Route::post('/categoriasproductos',[\App\Http\Controllers\CategoriaProductoController::class,'store']) -> name('categoriasproductos.store');
Route::get('/categoriasproductos/{id}',[\App\Http\Controllers\CategoriaProductoController::class,'edit']) -> name('categoriasproductos.edit');
Route::post('/categoriasproductos/search',[\App\Http\Controllers\CategoriaProductoController::class,'search']) -> name('categoriasproductos.search');
Route::post('/categoriasproductos/{id}',[\App\Http\Controllers\CategoriaProductoController::class,'update']) -> name('categoriasproductos.update');
Route::post('/categoriasproductos/{id}/delete',[\App\Http\Controllers\CategoriaProductoController::class,'destroy']) -> name('categoriasproductos.destroy');

Route::get('/productos',[\App\Http\Controllers\ProductoController::class,'index']) -> name('productos.index');
Route::get('/productos/create',[\App\Http\Controllers\ProductoController::class,'create']) -> name('productos.create');
Route::post('/productos',[\App\Http\Controllers\ProductoController::class,'store']) -> name('productos.store');
Route::get('/productos/{id}',[\App\Http\Controllers\ProductoController::class,'edit']) -> name('productos.edit');
Route::post('/productos/search',[\App\Http\Controllers\ProductoController::class,'search']) -> name('productos.search');
Route::post('/productos/{id}',[\App\Http\Controllers\ProductoController::class,'update']) -> name('productos.update');
Route::get('/productos/{id}/foto',[\App\Http\Controllers\ProductoController::class,'foto']) -> name('productos.foto');
Route::post('/productos/{id}/foto',[\App\Http\Controllers\ProductoController::class,'postFoto']) -> name('productos.post-foto');
Route::post('/productos/{id}/delete',[\App\Http\Controllers\ProductoController::class,'destroy']) -> name('productos.destroy');

Route::get('/ventas',[\App\Http\Controllers\VentaController::class,'index']) -> name('ventas.index');
Route::get('/ventas/create',[\App\Http\Controllers\VentaController::class,'create']) -> name('ventas.create');
Route::post('/ventas',[\App\Http\Controllers\VentaController::class,'store']) -> name('ventas.store');
Route::get('/ventas/{id}',[\App\Http\Controllers\VentaController::class,'edit']) -> name('ventas.edit');
Route::post('/ventas/search',[\App\Http\Controllers\VentaController::class,'search']) -> name('ventas.search');
Route::post('/ventas/{id}',[\App\Http\Controllers\VentaController::class,'update']) -> name('ventas.update');
Route::post('/ventas/{id}/delete',[\App\Http\Controllers\VentaController::class,'destroy']) -> name('ventas.destroy');

Route::get('/generales/productos/{id}',[\App\Http\Controllers\GeneralController::class,'productosPorCategoria']) -> name('generales.productos');
Route::get('/generales/ventas/{id}',[\App\Http\Controllers\GeneralController::class,'ventasPorProducto']) -> name('generales.ventas');
Route::post('/generales/search',[\App\Http\Controllers\GeneralController::class,'search']) -> name('generales.search');
Route::post('/generales/search2',[\App\Http\Controllers\GeneralController::class,'search2']) -> name('generales.search2');
Route::post('/home',[\App\Http\Controllers\GeneralController::class,'vendido']) -> name('generales.vendido');
Auth::routes();
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

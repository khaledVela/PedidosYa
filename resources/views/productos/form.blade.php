@extends('layouts.app')

@section('admin')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Formulario de Producto</div>
                    <div class="card-body">
                        <form method="post" action="{{!isset($objProducto)?route("productos.store"):""}}">
                            @csrf
                            <div>
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" value="{{old("nombre",$objProducto->nombre ?? "")}}"/>
                                @error("nombre")
                                <div class="text-danger">
                                    <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="descripcion">descripcion</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{old("descripcion",$objProducto->descripcion ?? "")}}"/>
                                @error("descripcion")
                                <div class="text-danger">
                                    <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="precio">precio</label>
                                <input type="text" class="form-control" name="precio" id="precio" value="{{old("precio",$objProducto->precio ?? "")}}"/>
                                @error("precio")
                                <div class="text-danger">
                                    <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="stock">stock</label>
                                <input type="text" class="form-control" name="stock" id="stock" value="{{old("stock",$objProducto->stock ?? "")}}"/>
                                @error("stock")
                                <div class="text-danger">
                                    <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-primary" type="submit">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


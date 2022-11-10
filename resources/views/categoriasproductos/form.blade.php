@extends('layouts.app')

@section('admin')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Formulario de Categoria</div>
                    <div class="card-body">
                        <form method="post" action="{{!isset($objCategoriaProducto)?route("categoriasproductos.store"):""}}">
                            @csrf
                            <div>
                                <label for="categoria_id">Categoria</label>
                                <select name="categoria_id" id="categoria_id" class="form-select">
                                    @foreach($listaCategorias as $objCategoria)
                                        <option value="{{$objCategoria->id}}"
                                            {{old("categoria_id",$objCategoriaProducto->categoria_id ?? "")==$objCategoria->id?"selected":""}}>
                                            {{$objCategoria->nombre}}
                                        </option>
                                    @endforeach
                                </select>
                                @error("categoria_id")
                                <div class="text-danger">
                                    <span>{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="producto_id">Producto</label>
                                <select name="producto_id" id="producto_id" class="form-select">
                                    @foreach($listaProductos as $objProducto)
                                        <option value="{{$objProducto->id}}"
                                            {{old("categoria_id",$objCategoriaProducto->categoria_id ?? "")==$objProducto->id?"selected":""}}>
                                            {{$objProducto->nombre}}
                                        </option>
                                    @endforeach
                                </select>
                                @error("producto_id")
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


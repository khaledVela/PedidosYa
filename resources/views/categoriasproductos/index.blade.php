@extends('layouts.app')

@section('admin')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">Lista de Categorias</div>
                            <div class="col-2 text-end">
                                <form action="{{route('categoriasproductos.search')}}" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="q" value="{{$search ?? ""}}"/>
                                        <button type="submit" class="btn btn-dark">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Categoria</th>
                                <th>Producto</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listaCategoriasProductos as $objCategoriaProducto)
                                <tr>
                                    <td>{{ $objCategoriaProducto->id }}</td>
                                    <td>{{ $objCategoriaProducto->getCategoriaForDisplay() }}</td>
                                    <td>{{ $objCategoriaProducto->getProductoForDisplay() }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route("categoriasproductos.edit",$objCategoriaProducto->id)}}">Editar</a>
                                    </td>
                                    <td>
                                        <form onsubmit="return confirm('Estás seguro que deseas eliminar?')"
                                            method="post" action="{{route("categoriasproductos.destroy",$objCategoriaProducto->id)}}">
                                            @csrf
                                            <button class="btn btn-danger" type="submit">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


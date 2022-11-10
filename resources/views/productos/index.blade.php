@extends('layouts.app')

@section('admin')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">Lista de Productos</div>
                            <div class="col-2 text-end">
                                <form action="{{route('productos.search')}}" method="POST">
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
                                <th>foto</th>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listaProductos as $objProducto)
                                <tr>
                                    <td><img class="foto-perfil" src="/images/{{ $objProducto->getFotoForDisplay() }}" alt="foto"/></td>
                                    <td>{{ $objProducto->id }}</td>
                                    <td>{{ $objProducto->nombre }}</td>
                                    <td>{{ $objProducto->descripcion }}</td>
                                    <td>{{ $objProducto->precio }}</td>
                                    <td>{{ $objProducto->stock }}</td>
                                    <td>
                                        <a class="btn btn-success"
                                           href="{{route("productos.foto",$objProducto->id)}}">Foto de Perfil</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route("productos.edit",$objProducto->id)}}">Editar</a>
                                    </td>
                                    <td>
                                        <form onsubmit="return confirm('Estás seguro que deseas eliminar?')"
                                            method="post" action="{{route("productos.destroy",$objProducto->id)}}">
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


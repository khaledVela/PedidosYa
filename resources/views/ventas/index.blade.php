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
                                <form action="{{route('ventas.search')}}" method="POST">
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
                                <th>Cantidad</th>
                                <th>Precio venta</th>
                                <th>Precio total</th>
                                <th>Producto</th>
                                <th>Cliente</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listaVentas as $objVentas)
                                <tr>
                                    <td>{{ $objVentas->id }}</td>
                                    <td>{{ $objVentas->cantidad }}</td>
                                    <td>{{ $objVentas->precio_venta }}</td>
                                    <td>{{ $objVentas->precio_total }}</td>
                                    <td>{{ $objVentas->getProductoForDisplay() }}</td>
                                    <td>{{ $objVentas->getClienteForDisplay() }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Estás seguro que deseas eliminar?')"
                                            method="post" action="{{route("ventas.destroy",$objVentas->id)}}">
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


@extends('layouts.app')

@section('logged')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">Lista de Categorias</div>
                            <div class="col-2 text-end">
                                <form action="{{route('generales.search2')}}" method="POST">
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
                        <div class="row">
                            <?php if (isset($listaCategorias)): ?>
                            @foreach($listaCategorias as $objCategoria)
                                <div class="col-md-4">
                                    <a class="linkNuevo" href="{{route("generales.productos",$objCategoria->id)}}">
                                        <div class="cardNew">
                                            <span>{{$objCategoria->nombre}}</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            <?php endif; ?>
                            <?php if (isset($listaProductos)): ?>
                            @foreach($listaProductos as $objProducto)
                                <div class="col-md-4">
                                    <a class="linkNuevo" href="{{route("generales.ventas",$objProducto->id)}}">
                                        <div class="cardNew">
                                            <img class="foto-perfil"
                                                 src="/images/{{ $objProducto->getFotoForDisplay() }}" alt="foto"/>
                                            <span>{{$objProducto->nombre}}</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Lista de Categorias</div>
                    <div class="card-body">
                        <div class="row">
                            <?php if (isset($listaCategorias)): ?>
                            @foreach($listaCategorias as $objCategoria)
                                <div class="col-md-4">
                                    <a class="linkNuevo" href="{{route("login")}}">
                                        <div class="cardNew">
                                            <span>{{$objCategoria->nombre}}</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('admin')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bienvenido Administrador</div>
                    <div class="card-body">
                        <p>Esta es la sección de administración</p>
                    </div>
                </div>
            </div>
        </div>
@endsection

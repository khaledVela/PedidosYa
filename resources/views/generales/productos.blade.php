@extends('layouts.app')

@section('logged')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">Lista de Productos</div>
                            <div class="col-2 text-end">
                                <form action="{{route('generales.search')}}" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <input type="hidden" name="categoria" value="{{$categoria}}">
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
                            <?php if (isset($listaProductosId)): ?>
                            @foreach($listaProductosId as $objProducto)
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
                            <?php if (count($listaProductosId) == 0): ?>
                            <div class="col-md-8">
                                <div class="text-danger">No hay productos con ese nombre en esta categoria</div>
                            </div>
                            <?php endif; ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

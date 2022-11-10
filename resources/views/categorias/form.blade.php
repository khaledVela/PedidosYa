@extends('layouts.app')

@section('admin')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Formulario de Categoria</div>
                    <div class="card-body">
                        <form method="post" action="{{!isset($objCategoria)?route("categorias.store"):""}}">
                            @csrf
                            <div>
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" value="{{old("nombre",$objCategoria->nombre ?? "")}}"/>
                                @error("nombre")
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


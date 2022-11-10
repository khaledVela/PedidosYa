@extends('layouts.app')

@section('admin')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Foto de Producto</div>

                    <div class="card-body">
                        <form enctype="multipart/form-data" method="post"
                                action="{{!isset($objProducto)?route("productos.foto"):""}}">
                            @csrf
                            <div>
                                <label for="foto">Seleccione una imagen</label>
                                <input class="form-control" type="file" name="foto" id="foto"/>
                                @error("foto")
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
@endsection

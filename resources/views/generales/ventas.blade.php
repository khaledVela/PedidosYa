@extends('layouts.app')

@section('logged')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header titulo">{{$producto->nombre}}</div>
                    <div class="card-body">
                        <img class="foto" src="/images/{{ $producto->getFotoForDisplay() }}" alt="foto"/>
                        <div class="precio">{{$producto->precio}}Bs</div>
                        <div class="descripcion">{{$producto->descripcion}}</div>
                        <div>
                            <div class="precio">Cantidad</div>
                            <div class="conjunto">
                                <button class="btn btn-primary" id="res">-</button>
                                <p class="cuadrado" id="cantidadgen"> 1 </p>
                                <button class="btn btn-primary" id="sum">+</button>
                            </div>
                        </div>
                        <p id="stock" hidden>{{$producto->stock}}</p>
                        <div class="precio">Total</div>
                        <div class="descripcion"><p id="total">1</p></div>
                        <?php if($producto->stock > 0): ?>
                        <form method="post" action="{{!isset($objVenta)?route("generales.vendido"):""}}" >
                            @csrf
                            <input type="hidden" name="cantidad" id="cantidad" value="1">
                            <input type="hidden" name="precio_venta" id="precio_venta" value="{{$producto->precio}}">
                            <input type="hidden" name="precio_total" id="precio_total" value="{{$producto->precio}}" >
                            <input type="hidden" name="producto_id" id="producto_id" value="{{$producto->id}}">
                            <input type="hidden" name="usuario_id" id="usuario_id" value="{{$usuario}}">
                            <div class="mt-3 centrear">
                                <button class="btn btn-primary anchado" type="submit">Comprar <i class="bi bi-cart"></i></button>
                            </div>
                        </form>
                        <?php endif; ?>
                        <?php if($producto->stock <= 0): ?>
                        <div class="centrear">
                            <a class="linkDanger" href="{{route("home")}}">Producto agotado</a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

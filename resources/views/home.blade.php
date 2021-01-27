@extends('layouts.app')

@section('title', 'Mercado a Distancia | Mi mercado')

@section('body-class', 'product-page')
@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('/img/puesto.jpg') }}');">

</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            @if (session('notification'))
                <div class="alert alert-warning">
                    <div class="container-fluid">
                      <div class="alert-icon">
                        <i class="material-icons">warning</i>
                      </div>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="material-icons">clear</i></span>
                      </button>
                      <b>ALERTA SOBRE CARRITO:</b> {{ session('notification') }}
                    </div>
                </div>
            @endif
            @if (session('notification_pending'))
                    <div class="alert alert-success">
                        <div class="container-fluid">
                          <div class="alert-icon">
                            <i class="material-icons">check</i>
                          </div>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="material-icons">clear</i></span>
                          </button>
                          <b>ALERTA DE PEDIDO:</b> {{ session('notification_pending') }}
                        </div>
                    </div>
            @endif
            <h2 class="title text-center">Mi mercado</h2>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="nav-align-center">
                        <ul class="nav nav-pills nav-pills-success" role="tablist">
                            <li class="active">
                                <a href="#dashboard" role="tab" data-toggle="tab">
                                    <i class="material-icons">shopping_cart</i>
                                    Carrito de compras
                                </a>
                            </li>
                            <li>
                                <a href="#tasks" role="tab" data-toggle="tab">
                                    <i class="material-icons">shop</i>
                                    Pedidos realizados
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr>
            <p class="text-center">Tu carrito de compras presenta {{ auth()->user()->cart->details->count() }} producto(s)</p>
                        
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Presentación del producto</th>
                                <th class="col-md-2 text-center">Nombre</th>
                                <th class="col-md-2 text-center">Descripción</th>
                                <th class="text-right">Precio</th>
                                <th class="text-right">Cantidad</th>
                                <th class="text-right">Subtotal</th>
                                <th class="col-md-2 text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (auth()->user()->cart->details as $detail)
                            <tr>
                                <td class="text-center">
                                    <img src="{{ $detail->product->featured_image_url }}" height="170px">
                                </td>
                                <td>
                                    <a class="col-md-12 text-center" href="{{ url('/products/'.$detail->product->id) }}" target="_blank">{{ $detail->product->name }}</a>
                                </td>
                                <td class="col-md-2 text-center">{{ $detail->product->description }}</td>
                                <td class="text-right">&dollar;{{ $detail->product->price }}</td>
                                <td class="text-center">{{ $detail->quantity }}</td>
                                <td class="text-right">&dollar;{{ $detail->quantity * $detail->product->price }}</td>
                                <td class="td-actions text-right">

                                    <form method="POST" action="{{ url('/cart') }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                                    <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs">
                                        <i style="font-size: 37px;" class="material-icons">production_quantity_limits</i>
                                    </a>
                                    <button type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-danger btn-simple btn-xs">
                                        <i style="font-size: 37px;" class="material-icons">remove_shopping_cart</i>
                                    </button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <p>
                        <strong>Importe a pagar: </strong>{{ auth()->user()->cart->total }}
                    </p>

         <div class="text-center">
            <form method="POST" action="{{ url('/order') }}">
                {{ csrf_field() }}
                <button class="btn btn-info btn-round">
                    <i class="material-icons">done</i> Realizar pedido
                </button>
            </form>
         </div>
        </div>

    </div>

</div>
@include('includes.footer')
@endsection
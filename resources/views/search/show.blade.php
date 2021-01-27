@extends('layouts.app')

@section('title', 'Mercado a Distancia | Resultados de búsqueda')

@section('body-class', 'profile-page')
@section('content')

<div class="header header-filter" style="background-image: url('{{ asset('/img/mercado-mex.jpg') }}');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    <div class="avatar">
                        <img width="300px" src="/img/search.png" alt="Mostrando resultados" class="img-raised img-circle" style="background-color: #F0FFFF">
                    </div>
                    <div class="name">
                        <h3 class="title">Resultados de búsqueda</h3>
                    </div>
                </div>
            </div>
            <div class="description text-center">
                <p>Se encontraron {{ $products->count() }} resultados para el término {{ $query }}.</p>
            </div>
            @if (session('notification'))
                            <div class="alert alert-success">
                                <div class="container-fluid">
                                  <div class="alert-icon">
                                    <i class="material-icons">check</i>
                                  </div>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                  </button>
                                  <b>ALERTA DE PRODUCTO:</b> {{ session('notification') }}
                                </div>
                            </div>
                        @endif
                        <div class="section text-center">
            
            <div class="team">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-md-4">
                        <div style="padding-bottom: 35px; padding-top: 35px; margin-bottom: 2em;" class="card team-player">
                            <img height="170" src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised img-circle">
                            <h4 class="title">
                                <a href="{{ url('/products/'.$product->id) }}">{{ $product->name }}</a>
                            </h4>
                            <h4>${{ $product->price }} pesos | {{ $product->description }}</h4>
                            </a>
                            <a href="{{ url('/products/'.$product->id) }}" rel="tooltip" title="Comprar producto" class="btn btn-warning btn-primary">
                                <span class="material-icons">
                                    add_shopping_cart
                                </span>
                            </a>
                            <!--
                            <a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-twitter"></i></a>
                            <a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-instagram"></i></a>
                            <a href="#pablo" class="btn btn-simple btn-just-icon btn-default"><i class="fa fa-facebook-square"></i></a>
                            -->
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="text-center">
                    {{ $products->links() }}
                </div>
            </div>

        </div>

        </div>
    </div>
</div>

@include('includes.footer')
@endsection
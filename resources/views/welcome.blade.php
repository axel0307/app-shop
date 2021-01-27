@extends('layouts.app')

@section('title', 'Bienvenido a nuestro mercado')

@section('styles')
    <style>
        .team .row .col-md-4{
            margin-bottom: 2em;
        }
        .team .row {
              display: -webkit-box;
              display: -webkit-flex;
              display: -ms-flexbox;
              display:         flex;
              flex-wrap: wrap;
            }
        .team .row > [class*='col-'] {
          display: flex;
          flex-direction: column;
        } 
        .tt-query {
          -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
             -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }

        .tt-hint {
          color: #999
        }

        .tt-menu {    /* used to be tt-dropdown-menu in older versions */
          width: 422px;
          margin-top: 4px;
          padding: 4px 0;
          background-color: #fff;
          border: 1px solid #ccc;
          border: 1px solid rgba(0, 0, 0, 0.2);
          -webkit-border-radius: 4px;
             -moz-border-radius: 4px;
                  border-radius: 4px;
          -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
             -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                  box-shadow: 0 5px 10px rgba(0,0,0,.2);
        }

        .tt-suggestion {
          padding: 3px 20px;
          line-height: 24px;
        }

        .tt-suggestion.tt-cursor,.tt-suggestion:hover {
          color: #fff;
          background-color: #0097cf;

        }

        .tt-suggestion p {
          margin: 0;
        }
    </style>
@endsection

@section('body-class', 'landing-page')
@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('/img/puesto.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Bienvenido a nuestro Mercado a Distancia</h1>
                <h3 style="font-family: 'Niconne', cursive; font-size: 40px;" class="tim-typo">
                    Con la misma calidad que buscas pero sin salir de casa</h3>
                <br />
                <a href="{{ route('register') }}" class="btn btn-danger btn-round">
                    <i class="fa fa-heart heart"></i>  ¿Te quieres unir a nuestra comunidad?
                </a>
            </div>
        </div>
    </div>
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center section-landing">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="text-center">
                    <img width="300px" src="{{ asset('/img/logo-patch.png') }}">
                    </div>
                    <h2 class="title">¿Qué es Mercado a Distancia?</h2>
                    <h5 class="description">
                    Al estar en una crisis como en la que nos enfrentamos en la actualidad donde nos obliga al confinamiento y a tener el menor contacto posible con el exterior, se hace un reto adaptarse al nuevo cambio para aquellos negocios donde viven al día dependiendo de sus ventas, las grandes compañías tienen el presupuesto y el personal necesario para reestructurarse pero aquellos que son pequeños comerciantes se están quedando atrás, especialmente los que se encuentran en mercados pues ahí menos la gente se arriesga a ir, la solución se la ofrece “Mercado a Distancia”.
                    </h5>
                    <h5 class="description">
                    Donde básicamente su papel es hacer la compra del mercado (entre otras cosas) que puede llegar a ser agotadora si es que no esta tan cerca de ti o simplemente por seguridad por la pandemia que atravesamos ahora. 
                    </h5>
                    <h5 class="description">
                    Los proveedores de dichos productos dependerán del área donde se encuentre cada cliente, aunque la calidad se promete ser la misma sin importar la zona o distribuidor. El servicio a domicilio que ofrecemos es totalmente dependiente de nosotros, nos encargamos de llevar los productos con la más alta higiene y eficacia.
                    </h5>
                </div>
            </div>

            <div class="features">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-primary">
                                <i class="material-icons">chat</i>
                            </div>
                            <h4 class="info-title">Atendemos tus dudas</h4>
                            <p>Atendemos rápidamente cualquier consulta que tengas vía chat. No estás sólo, sino que siempre estamos atento a tus inquietudes.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">verified_user</i>
                            </div>
                            <h4 class="info-title">Pago seguro</h4>
                            <p>Todo pedido que realices será confirmado a través de una llamada. Si no confías en los pagos en línea puedes pagar contrareembolso el valor acordado.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="material-icons">fingerprint</i>
                            </div>
                            <h4 class="info-title">Información privada</h4>
                            <p>Los pedidos que realices sólo los conocerás tú a través de tu panel de usuario. Nadie más tiene acceso a esta información.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section text-center">
            
            <h2 style="font-family: 'Salsa', cursive; color:#DC143C; font-size: 40px" class="title">Conoce y busca productos a través de nuestras categorías</h2>

            <form class="form-inline" method="GET" action="{{ url('/search') }}">
                <input style="width: 400px" type="text" placeholder="¿Qué producto te interesa comprar?" class="form-control" name="query" id="search">
                <button class="btn btn-danger btn-just-icon" type="submit">
                    <i class="material-icons">search</i>
                </button>
            </form>

            <div class="team">
                <div class="row">
                    @foreach ($categories as $category)
                    <div class="col-md-4">
                        <div style="padding-bottom: 35px; padding-top: 35px; background-position: center;" class="card team-player">
                            <img height="150px" src="{{ $category->featured_image_url }}" alt="Imagen Representativa de la Categoría" class="img-raised img-circle">
                            <h4 class="title">
                                <a href="{{ url('/categories/'.$category->id) }}">{{ $category->name }}</a>
                                <br/>
                                <small class="text-muted">{{ $category->description }}</small>
                            </h4>
                                </a>
                            <a href="{{ url('/categories/'.$category->id) }}" rel="tooltip" title="Ver los productos de esta categoría" class="btn btn-danger btn-sm">
                                <i style="font-size: 25px;" class="material-icons">touch_app</i> Conoce sus productos
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
            </div>

        </div>


        <div class="section landing-section">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center title">¿Necesitas ayuda con algo?</h2>
                    <h4 class="text-center description">Si tuviste algún problema con nuestra plataforma o referente a las envíos puedes escribirnos aquí y te enviaremos un correo inmediatamente, de igual forma si tienes algún tipo de sugerencia, pregunta o consulta de nuestros productos puedes escribirnos aquí sin problema.</h4>
                    <form class="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Correo electrónico</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label">Tu mensaje</label>
                            <textarea class="form-control" rows="4"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <button class="btn btn-primary btn-raised">
                                    Enviar mensaje
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>

@include('includes.footer')
@endsection

@section('scripts')
    <script src="{{ asset('/js/typeahead.bundle.min.js') }}"></script>
    <script>
        $(function (){
            // 
            var products = new Bloodhound({
              datumTokenizer: Bloodhound.tokenizers.whitespace,
              queryTokenizer: Bloodhound.tokenizers.whitespace,
              // `states` is an array of state names defined in "The Basics"
              prefetch: '{{ url("/products/json") }}'
            });

            // inicializar typeahead sobre el input de busqueda
            $('#search').typeahead({
                hint: true,
                highlight: true,
                minLenght: 1
            }, {
                name: 'products',
                source: products
            });
        });
    </script>
@endsection
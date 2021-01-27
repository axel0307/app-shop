@extends('layouts.app')

@section('title', 'Listado de categorías')

@section('body-class', 'product-page')
@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('/img/puesto.jpg') }}');">
    
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title">Listado de categorías</h2>

            <div class="team">
                <div class="row">
                    <a href="{{ url('/admin/categories/create') }}" class="btn btn-primary btn-round">Nueva categoría</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="col-md-4 text-center">Nombre</th>
                                <th class="col-md-4 text-center">Descripción</th>
                                <th>Representación</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                            <tr>
                                <td class="text-center">{{ ($key+1) }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <img src="{{ $category->featured_image_url }}" height="50px">
                                </td>
                                <td class="td-actions text-center">
                                    <form method="POST" action="{{ url('/admin/categories/'.$category->id) }}">
                                    {{ csrf_field() }}
                                    <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                                    {{ method_field('DELETE') }}
                                    <!-- <input type="hidden" name="_method" value="DELETE"> -->
                                    <a href="{{ url('/categories/'.$category->id) }}" rel="tooltip" title="Ver categoría" class="btn btn-info btn-simple btn-xs">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    <a href="{{ url('/admin/categories/'.$category->id.'/edit') }}" rel="tooltip" title="Editar categoría" class="btn btn-success btn-simple btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-danger btn-simple btn-xs">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>

        </div>

    </div>

</div>

@include('includes.footer')
@endsection

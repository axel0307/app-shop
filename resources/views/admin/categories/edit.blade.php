@extends('layouts.app')

@section('title', 'Edición de categoría')

@section('body-class', 'product-page')
@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('/img/puesto.jpg') }}');">

</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Editar categoría</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('/admin/categories/'.$category->id.'/edit') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group label-floating">
                        <label class="control-label">Nombre de la categoría</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <label class="control-label">Representación de la categoría</label>
                    <input type="file" name="image">
                    @if($category->image)
                    <p class="help-block">
                        Subir solo si desea reemplazar <a href="{{ asset('/images/categories/'.$category->image) }}" target="_blank">la imagen actual de la categoría</a>
                    </p>
                    @endif
                </div>
            </div>

                <textarea class="form-control" placeholder="Descripción del producto" rows="5" name="description">{{ old('description', $category->description) }}</textarea>

                <button style="margin-left: 35%" class="btn btn-success">Actualizar categoría</button>
                <a href="{{ url('/admin/categories') }}" class="btn btn-danger">Cancelar</a>
            </form>

        </div>

    </div>

</div>

@include('includes.footer')
@endsection

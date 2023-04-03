@extends('admin.layouts.app')
@section('admin')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Categorías </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">editando categoría</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <div class="template-demo">
                            <h4 class="card-title" style="float: left;">editando categoría</h4>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-danger"
                                style="float:right;">Volver</a>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::model($category, [
                            'route' => ['admin.categories.update', $category],
                            'method' => 'PUT',
                            'class' => 'form-horizontal forms-sample',
                        ]) !!}
                        @include('backend.category.partials.form')
                        <div class="btn-group pull-right">
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-danger">Cancelar</a>
                            {!! Form::submit('Actualizar', ['class' => 'mr-2 btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

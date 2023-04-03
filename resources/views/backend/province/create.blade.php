@extends('admin.layouts.app')
@section('admin')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Provincia </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registrando provincia</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <div class="template-demo">
                            <h4 class="card-title" style="float: left;">Registrando provincia</h4>
                            <a href="{{ route('admin.provinces.index') }}" class="btn btn-danger"
                                style="float:right;">Cancelar
                                registro</a>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::open([
                            'method' => 'POST',
                            'route' => 'admin.provinces.store',
                            'class' => 'form-horizontal',
                        ]) !!}
                        @include('backend.province.partials.form')
                        <div class="btn-group pull-right">
                            {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
                            <a href="{{ route('admin.provinces.index') }}" class="btn btn-danger">Volver</a>
                            {!! Form::submit('Guardar', ['class' => 'mr-2 btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

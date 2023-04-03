@extends('admin.layouts.app')
@section('admin')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Provincia </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista de Provincia</li>
                </ol>
            </nav>
        </div>
        {{-- @if (session('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Excelente!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif --}}
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="template-demo">
                        <h4 class="card-title" style="float: left;">Provincia</h4>
                        <a href="{{ route('admin.provinces.create') }}" class="btn btn-primary" style="float:right;">Nueva
                            Provincia</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Provincia español </th>
                                    <th> Provincia ingles</th>
                                    <th> Categoría</th>
                                    <th colspan="2" class="text-center"> Acciones </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($provinces as $province)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td> {{ $province->province_es }}</td>
                                        <td> {{ $province->province_en }}</td>
                                        <td> {{ $province->departament_es }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.provinces.edit', $province->id) }}"
                                                class="btn btn-warning">Editar</a>
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.provinces.destroy', $province->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger" class="btn btn-danger"
                                                    onclick="return confirm('¿ Seguro de eliminar?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-danger">Sin categorías</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $provinces->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection

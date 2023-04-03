@extends('admin.layouts.app')
@section('admin')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Departamento </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista de Departamentos</li>
                </ol>
            </nav>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="template-demo">
                        <h4 class="card-title" style="float: left;">Departamento</h4>
                        <a href="{{ route('admin.departaments.create') }}" class="btn btn-primary"
                            style="float:right;">Nueva
                            Departamento</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Departamento español </th>
                                    <th> Departamento ingles</th>
                                    <th colspan="2" class="text-center"> Acciones </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($departaments as $departament)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td> {{ $departament->departament_es }}</td>
                                        <td> {{ $departament->departament_en }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.departaments.edit', $departament->id) }}"
                                                class="btn btn-warning">Editar</a>
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.departaments.destroy', $departament->id) }}"
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
                                        <td colspan="5" class="text-center text-danger">Sin Departamentos</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $departaments->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection

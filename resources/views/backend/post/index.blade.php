@extends('admin.layouts.app')
@section('admin')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Post </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista de Posts</li>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="template-demo">
                        <h4 class="card-title" style="float: left;">Post</h4>
                        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary" style="float:right;">Nueva
                            Post</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Título post </th>
                                    <th> Categoría</th>
                                    <th> Región</th>
                                    <th> Imagen</th>
                                    <th> Creado</th>
                                    <th colspan="2" class="text-center"> Acciones </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($posts as $post)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td> {{ Str::limit($post->title_es, 20) }}</td>
                                        <td> {{ $post->category_es }}</td>
                                        <td> {{ $post->departament_es }}</td>
                                        <td>
                                            @if ($post->image)
                                                <img src="{{ asset('storage/' . $post->image) }}">
                                            @else
                                                <img
                                                    src="https://cdn.pixabay.com/photo/2021/11/14/12/53/ship-6794508_960_720.jpg">
                                            @endif
                                        </td>
                                        <td> {{ Carbon\Carbon::parse($post->post_date)->diffForHumans() }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.posts.edit', $post->id) }}"
                                                class="btn btn-warning">Editar</a>
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger" class="btn btn-danger"
                                                    onclick="return confirm('¿ Seguro de eliminar?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-danger">Sin Posts</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $posts->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection

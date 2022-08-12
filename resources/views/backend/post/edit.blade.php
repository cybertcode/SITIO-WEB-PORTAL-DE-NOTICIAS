@extends('admin.layouts.app')
@section('admin')
    {{-- PARA TRABAJAR CON AJAX --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Publicación </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editando Publicación</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <div class="template-demo">
                            <h4 class="card-title" style="float: left;">Editando Publicación</h4>
                            <a href="{{ route('admin.posts.index') }}" class="btn btn-danger" style="float:right;">Cancelar
                                edición</a>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::model($post, [
                            'route' => ['admin.posts.update', $post],
                            'method' => 'PUT',
                            'class' => 'form-horizontal forms-sample',
                            'enctype' => 'multipart/form-data',
                        ]) !!}
                        @include('backend.post.partials.form')
                        <div class="btn-group pull-right my-4">
                            {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
                            <a href="{{ route('admin.posts.index') }}" class="btn btn-danger">Volver</a>
                            {!! Form::submit('Guardar', ['class' => 'mr-2 btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Para llenar las subcategorias --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    // Para trabajar con nombre de rutas
                    var url = "{{ route('admin.subcategories.all', ':category_id') }}";
                    url = url.replace(':category_id', category_id);
                    // document.location.href = url;
                    $.ajax({
                        url: url,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            // console.log(data)
                            $("#subcategory_id").empty();
                            $.each(data, function(key, value) {
                                $("#subcategory_id").append('<option value="' + value
                                    .id + '">' + value.subcategory_es + ' | ' +
                                    value
                                    .subcategory_en +
                                    '</option>');
                            });

                        },

                    });
                } else {
                    alert('danger');
                }
            });
        });
        $(document).ready(function() {
            $('select[name="departament_id"]').on('change', function() {
                var departament_id = $(this).val();
                if (departament_id) {
                    // Para trabajar con nombre de rutas
                    var url = "{{ route('admin.departaments.all', ':departament_id') }}";
                    url = url.replace(':departament_id', departament_id);
                    // document.location.href = url;
                    $.ajax({
                        url: url,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            // console.log(data)
                            $("#province_id").empty();
                            $.each(data, function(key, value) {
                                $("#province_id").append('<option value="' + value
                                    .id + '">' + value.province_es + ' | ' + value
                                    .province_en + '</option>');
                            });

                        },

                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection

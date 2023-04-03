<div class="form-group row">
    <div class="form-group{{ $errors->has('title_es') ? ' has-error' : '' }} col-12 col-lg-6">
        {!! Form::label('title_es', 'Título español') !!}
        {!! Form::text('title_es', null, ['class' => 'form-control', 'placeholder' => 'título']) !!}
        <small class="text-danger">{{ $errors->first('title_es') }}</small>
    </div>
    <div class="form-group{{ $errors->has('title_en') ? ' has-error' : '' }} col-12 col-lg-6">
        {!! Form::label('title_en', 'Título inglés') !!}
        {!! Form::text('title_en', null, ['class' => 'form-control', 'placeholder' => 'título']) !!}
        <small class="text-danger">{{ $errors->first('title_en') }}</small>
    </div>
</div>
<div class="form-group row" ">
    <div class=" form-group{{ $errors->has('category_id') ? ' has-error' : '' }} col-12 col-lg-6">
    {!! Form::label('category_id', 'Categoría') !!}
    {!! Form::select('category_id', $categories, null, [
    'class' => 'form-control',
    ]) !!}
    <small class="text-danger">{{ $errors->first('category_id') }}</small>
</div>
<div class="form-group{{ $errors->has('subcategory_id') ? ' has-error' : '' }} col-12 col-lg-6">
    {!! Form::label('subcategory_id', 'Subcategoría') !!}
    {!! Form::select('subcategory_id', ['' => 'Seleecione'], null, [
    'id' => 'subcategory_id',
    'class' => 'form-control',
    ]) !!}
    <small class="text-danger">{{ $errors->first('subcategory_id') }}</small>
</div>
</div>
<div class="form-group row">
    <div class="form-group{{ $errors->has('departament_id') ? ' has-error' : '' }} col-12 col-lg-6">
        {!! Form::label('departament_id', 'Departamento') !!}
        {!! Form::select('departament_id', $departaments, null, [
        'id' => 'departament_id',
        'class' => 'form-control',
        ]) !!}
        <small class="text-danger">{{ $errors->first('departament_id') }}</small>
    </div>
    <div class="form-group{{ $errors->has('province_id') ? ' has-error' : '' }} col-12 col-lg-6">
        {!! Form::label('province_id', 'Provincia') !!}
        {!! Form::select('province_id', ['' => 'Seleccione'], null, [
        'class' => 'form-control',
        ]) !!}
        <small class="text-danger">{{ $errors->first('province_id') }}</small>
    </div>
</div>
<div class="form-group row">
    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }} col-12">
        {!! Form::label('image', 'Imagen') !!}
        <div class="input-group col-xs-12">
            {!! Form::file('image', ['class' => 'form-control file-upload-info']) !!}
        </div>
        <small class="text-danger">{{ $errors->first('image') }}</small>
    </div>
</div>
<div class="form-group row">
    <div class="form-group{{ $errors->has('tags_es') ? ' has-error' : '' }} col-12 col-lg-6">
        {!! Form::label('tags_es', 'Etiqueta español') !!}
        {!! Form::text('tags_es', null, ['class' => 'form-control', 'placeholder' => 'etiqueta español']) !!}
        <small class="text-danger">{{ $errors->first('tags_es') }}</small>
    </div>
    <div class="form-group{{ $errors->has('tags_en') ? ' has-error' : '' }} col-12 col-lg-6">
        {!! Form::label('tags_en', 'Etiqueta inglés') !!}
        {!! Form::text('tags_en', null, ['class' => 'form-control', 'placeholder' => 'etiqueta ingles']) !!}
        <small class="text-danger">{{ $errors->first('tags_en') }}</small>
    </div>
</div>
<div class="form-group row">
    <div class="form-group{{ $errors->has('details_es') ? ' has-error' : '' }}">
        {!! Form::label('details_es', 'Detalle español') !!}
        {!! Form::textarea('details_es', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('details_es') }}</small>
    </div>
    <div class="form-group{{ $errors->has('details_en') ? ' has-error' : '' }}">
        {!! Form::label('details_en', 'Detalle inglés') !!}
        {!! Form::textarea('details_en', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('details_en') }}</small>
    </div>
</div>
<hr>
<h4 class="text-center">Otras opciones</h4>
<div class="row">
    <label for="headline" class="form-check-label col-md-3">
        {!! Form::checkbox('headline', '1', null, ['id' => 'headline', 'class' => 'form-check-input']) !!} Titular
    </label>
    <label for="first_section" class="form-check-label col-md-3">
        {!! Form::checkbox('first_section', '1', null, ['id' => 'first_section', 'class' => 'form-check-input']) !!} Primera sección
    </label>
    <label for="first_section_thumbnail" class="form-check-label col-md-3">
        {!! Form::checkbox('first_section_thumbnail', '1', null, [
        'id' => 'first_section_thumbnail',
        'class' => 'form-check-input',
        ]) !!} Primera sección miniatura
    </label>
    <label for="bigthumbnail" class="form-check-label col-md-3">
        {!! Form::checkbox('bigthumbnail', '1', null, ['id' => 'bigthumbnail', 'class' => 'form-check-input']) !!} Miniatura grande
    </label>
</div>

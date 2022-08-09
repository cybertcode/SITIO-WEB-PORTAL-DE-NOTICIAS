<div class="form-group{{ $errors->has('category_es') ? ' has-error' : '' }}">
    {!! Form::label('category_es', 'Categoría español') !!}
    {!! Form::text('category_es', null, ['class' => 'form-control', 'placeholder' => 'ingrese categoría español']) !!}
    <small class="text-danger">{{ $errors->first('category_es') }}</small>
</div>
<div class="form-group{{ $errors->has('category_en') ? ' has-error' : '' }}">
    {!! Form::label('category_en', 'Categoría ingles') !!}
    {!! Form::text('category_en', null, ['class' => 'form-control', 'placeholder' => 'ingrese categoría ingles']) !!}
    <small class="text-danger">{{ $errors->first('category_en') }}</small>
</div>

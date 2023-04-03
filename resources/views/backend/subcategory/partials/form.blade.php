<div class="form-group{{ $errors->has('subcategory_es') ? ' has-error' : '' }}">
    {!! Form::label('subcategory_es', 'Subcategoría español') !!}
    {!! Form::text('subcategory_es', null, [
        'class' => 'form-control',
        'placeholder' => 'ingrese subcategoría español',
    ]) !!}
    <small class="text-danger">{{ $errors->first('subcategory_es') }}</small>
</div>
<div class="form-group{{ $errors->has('subcategory_en') ? ' has-error' : '' }}">
    {!! Form::label('subcategory_en', 'Subcategoría inglés') !!}
    {!! Form::text('subcategory_en', null, [
        'class' => 'form-control',
        'placeholder' => 'ingrese subcategoría inglés',
    ]) !!}
    <small class="text-danger">{{ $errors->first('subcategory_en') }}</small>
</div>
<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
    {!! Form::label('category_id', 'Categoría') !!}
    {!! Form::select('category_id', $categories, null, [
        'class' => 'form-control',
    ]) !!}
    <small class="text-danger">{{ $errors->first('category_id') }}</small>
</div>

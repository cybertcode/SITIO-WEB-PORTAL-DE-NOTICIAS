<div class="form-group{{ $errors->has('province_es') ? ' has-error' : '' }}">
    {!! Form::label('province_es', 'provincia español') !!}
    {!! Form::text('province_es', null, [
        'class' => 'form-control',
        'placeholder' => 'ingrese provincia español',
    ]) !!}
    <small class="text-danger">{{ $errors->first('province_es') }}</small>
</div>
<div class="form-group{{ $errors->has('province_en') ? ' has-error' : '' }}">
    {!! Form::label('province_en', 'provincia inglés') !!}
    {!! Form::text('province_en', null, [
        'class' => 'form-control',
        'placeholder' => 'ingrese provincia inglés',
    ]) !!}
    <small class="text-danger">{{ $errors->first('province_en') }}</small>
</div>
<div class="form-group{{ $errors->has('province_id') ? ' has-error' : '' }}">
    {!! Form::label('departament_id', 'Categoría') !!}
    {!! Form::select('departament_id', $departaments, null, [
        'class' => 'form-control',
    ]) !!}
    <small class="text-danger">{{ $errors->first('departament_id') }}</small>
</div>

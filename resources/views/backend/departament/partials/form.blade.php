<div class="form-group{{ $errors->has('departament_es') ? ' has-error' : '' }}">
    {!! Form::label('departament_es', 'Departamento español') !!}
    {!! Form::text('departament_es', null, [
        'class' => 'form-control',
        'placeholder' => 'ingrese departamento español',
    ]) !!}
    <small class="text-danger">{{ $errors->first('departament_es') }}</small>
</div>
<div class="form-group{{ $errors->has('departament_en') ? ' has-error' : '' }}">
    {!! Form::label('departament_en', 'Departamento ingles') !!}
    {!! Form::text('departament_en', null, [
        'class' => 'form-control',
        'placeholder' => 'ingrese departamento ingles',
    ]) !!}
    <small class="text-danger">{{ $errors->first('departament_en') }}</small>
</div>

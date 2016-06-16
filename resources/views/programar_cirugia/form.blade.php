
<div class="form-group">
	{!! Form::label('fecha', 'Fecha') !!}
	{!! Form::text('fecha', fecha_dmy($date), [
		'class' => 'form-control',
		'placeholder' => 'Selecciona la fecha', 
		'readonly'
	]) !!}
</div>
<div class="form-group">
	{!! Form::label('horario', 'Horario') !!}
	
	{!! Form::text('horario', null, [
		'id' => $paciente->rfc.$paciente->id,
		'class' => 'form-control',
		'placeholder' => 'Ingresa un horario', 
		'required'
	]) !!}
</div>

<div class="form-group">
	{!! Form::label('sala', 'Sala') !!}
	{!! Form::select('sala', ['1' => 'Sala 1', '2' => 'Sala 2', '3' => 'Sala 3'], null, [
		'class' => 'form-control',
	    'placeholder' => 'Selecciona una Sala', 
	    'required'])
	!!}
</div>
<div class="form-group">
	{!! Form::select('ubicacion', ['HOSP' => 'HOSP', 'EXT' => 'EXT'], null, [
		'class' => 'form-control',
	    'placeholder' => 'Selecciona una ubicacion', 
	    'required'])
	!!}
</div>

<div class="form-group">
	{!! Form::label('medico_id', 'Medico') !!}
	{!! Form::select('medico_id', $medicos, null, [
    'class' => 'form-control',
    'placeholder' => 'Selecciona un Medico', 
    'required'
  ]) !!}
</div>
<div class="form-group">
	{!! Form::label('cirugia_id', 'Cirugia') !!}
	{!! Form::select('cirugia_id', $cirugias, null, [
    'class' => 'form-control',
    'placeholder' => 'Selecciona un procedimiento', 
    'required'
  ]) !!}
</div>
<div class="form-group">
	{!! Form::label('anestesiologo_id', 'Anestesiologo') !!}
	{!! Form::select('anestesiologo_id', $anestesiologos, null, [
    'class' => 'form-control',
    'placeholder' => 'Selecciona un Anestesiologo', 
    'required'
  ]) !!}
</div>
{{ Form::hidden('paciente_id', $paciente->id) }}
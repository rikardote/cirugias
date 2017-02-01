<div class="form-group">
	{!! Form::label('fecha', 'Fecha') !!}
	{!! Form::text('fecha', fecha_dmy($date), [
		'class' => 'form-control',
		'placeholder' => 'Selecciona la fecha', 
		'readonly'
	]) !!}
</div>


<div class="form-group">
	{!! Form::select('ubicacion', ['HOSP' => 'HOSP', 'EXT' => 'EXT'], null, [
		'class' => 'form-control',
	    'placeholder' => 'Selecciona una ubicacion', 
	    'required'])
	!!}
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
	{!! Form::label('urgencias', 'Urgencia?') !!}
	{!!Form::checkbox('urgencias', 1);	 !!}
</div>

{{ Form::hidden('paciente_id', $paciente->id) }}

<div class="form-group">
	{!! Form::label('fecha', 'Fecha') !!}
	{!! Form::text('fecha', fecha_dmy($surgery->fecha), [
		'class' => 'form-control',
		'placeholder' => 'Selecciona la fecha', 
	]) !!}
</div>
<div class="form-group">
	{!! Form::label('horario', 'Horario') !!}
	
	{!! Form::text('horario', null, [
		'id' => 'timepicker',
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
	{!! Form::select('medico_id', $medicos, $surgery->medico_id, [
    'class' => 'form-control',
    'placeholder' => 'Selecciona un Medico', 
    'required'
  ]) !!}
</div>
<div class="form-group">
	{!! Form::label('cirugia_id', 'Cirugia') !!}
	{!! Form::select('cirugia_id', $cirugias, $surgery->cirugia_id, [
    'class' => 'form-control',
    'placeholder' => 'Selecciona un procedimiento', 
    'required'
  ]) !!}
</div>
<div class="form-group">
	{!! Form::label('anestesiologo_id', 'Anestesiologo') !!}
	{!! Form::select('anestesiologo_id', $anestesiologos, $surgery->anestesiologo_id, [
    'class' => 'form-control',
    'placeholder' => 'Selecciona un Anestesiologo', 
    'required'
  ]) !!}
</div>
{{ Form::hidden('paciente_id', $surgery->paciente_id) }}

 <script>
			$('#timepicker').timepicker({ 
				'step': 30,
				'minTime': '7am',
          		'maxTime': '6pm',
			    'timeFormat': 'H:i',
			    'disableTextInput': true
			});
			
		</script> 
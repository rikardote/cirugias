{!! Form::model($cirugia, ['route' => ['programar_cirugia.update', $cirugia->id], 'method' => 'PATCH']) !!}
	<div class="form-group">
	{!! Form::label('tiempo_qx', 'Tiempo de QX. Proyectado') !!}
	{!! Form::text('tiempo_qx', null, [
		'class' => 'form-control'
	]) !!}
	</div>
	<div class="form-group">
		{!! Form::label('hora_inicial', 'Horario inicial') !!}
		
		{!! Form::text('hora_final', null, [
			'id' => 'horario',
			'class' => 'form-control',
			'placeholder' => 'Ingresa un horario', 
			'required'
		]) !!}
	</div>
	<div class="form-group">
		{!! Form::label('hora_final', 'Horario final') !!}
		
		{!! Form::text('hora_final', null, [
			'id' => 'horario_final',
			'class' => 'form-control',
			'placeholder' => 'Ingresa un horario', 
			'required'
		]) !!}
	</div>

	<div class="form-group">
		{!! Form::label('cirugia_realizada', 'Cirugia') !!}
		{!! Form::select('cirugia_realizada', $procedimientos, $cirugia->cirugia_id, [
    	'class' => 'form-control',
    	'placeholder' => 'Selecciona un procedimiento', 
    	'required'
  	]) !!}
	</div>

	<div class="form-group">
	{!! Form::label('observaciones', 'Obsevaciones') !!}
	{!! Form::text('observaciones', null, [
		'class' => 'form-control'
	]) !!}
	</div>

	<div align="right">
     {!! Form::submit('Registrar', ['class' => 'btn btn-success']) !!}
 	</div>
{!! Form::close()!!}

<script>
	$('#horario').timepicker({ 
		'step': 30,
		'minTime': '7am',
        'maxTime': '6pm',
		'timeFormat': 'H:i',
		'disableTextInput': true
	});
</script>

<script>
	$('#horario_final').timepicker({ 
		'step': 30,
		'minTime': '7am',
        'maxTime': '6pm',
		'timeFormat': 'H:i',
		'disableTextInput': true
	});
</script>
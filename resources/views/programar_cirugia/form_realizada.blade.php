<p>Paciente: {{$surgery->paciente->fullname}}</p>
<p>Sala: {{$surgery->sala}}, Cirugia Proyectada: {{$surgery->cirugia->name}}</p>
{!! Form::model($surgery, ['route' => ['programar_cirugia.update', $surgery->id], 'method' => 'PATCH']) !!}
	<div class="form-group">
	{!! Form::label('tiempo_qx', 'Tiempo de QX. Proyectado') !!}
	{!! Form::number('tiempo_qx', null, [
		'class' => 'form-control',
		'required',
		'id' => 'tiempo_qx',
		'min' => '1', 
	]) !!}
	</div>
	<div class="form-group">
		{!! Form::label('hora_inicio', 'Horario inicial') !!}
		{!! Form::text('hora_inicio', null, [
			'id' => 'hora_inicio',
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
		{!! Form::label('cirugia_realizada', 'Cirugia Realizada') !!}
		{!! Form::select('cirugia_realizada', $procedimientos, $surgery->cirugia_id, [
    	'class' => 'form-control',
    	'placeholder' => 'Selecciona un procedimiento', 
    	'required'
  	]) !!}
	</div>

	<div class="form-group">
	{!! Form::label('observaciones', 'Obsevaciones') !!}
	{!! Form::textarea('observaciones', null, [
		'class' => 'form-control'
	]) !!}
	</div>

	<div align="right">
     {!! Form::submit('Registrar', ['class' => 'btn btn-success']) !!}
 	</div>
{!! Form::close()!!}

<script>
	$('#hora_inicio').timepicker({ 
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
<script>
	$(function(){
  $("#tiempo_qx").val("");
});
</script>

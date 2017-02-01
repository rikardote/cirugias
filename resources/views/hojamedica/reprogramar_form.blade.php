<div class="form-group">
	{!! Form::label('fecha', 'Fecha') !!}
	{!! Form::text('fecha', fecha_dmy($surgery->fecha), [
		'class' => 'form-control',
		'placeholder' => 'Selecciona la fecha', 
		'id' => 'fecha'	
		])
	!!}
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
	{!! Form::label('observaciones', 'Observaciones') !!}
	
	{!! Form::text('observaciones', null, [
		'class' => 'form-control',
		'placeholder' => 'Observaciones', 
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

<script type="text/javascript">
  $(function() {
    $( "#datepicker_inicial1" ).datepicker();
  });
  </script>
<script>
	$.datepicker.setDefaults($.datepicker.regional['es-MX']);
	$('#fecha').datepicker({
	    dateFormat: 'dd/mm/yy',
	    changeMonth: true,
	    changeYear: true,
	    firstDay: 1,
	 });
</script> 
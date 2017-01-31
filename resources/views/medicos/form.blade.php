<div class="form-group">
	{!! Form::label('nombres', 'Nombres') !!}
	
	{!! Form::text('nombres', null, [
		
		'class' => 'form-control',
		'placeholder' => 'Nombres', 
		'required'
	]) !!}
</div>
<div class="form-group">
	{!! Form::label('apellido_pat', 'Apellido Paterno') !!}
	
	{!! Form::text('apellido_pat', null, [
		
		'class' => 'form-control',
		'placeholder' => 'Apellido Paterno', 
		'required'
	]) !!}
</div>
<div class="form-group">
	{!! Form::label('apellido_mat', 'Apellido Materno') !!}
	
	{!! Form::text('apellido_mat', null, [
		
		'class' => 'form-control',
		'placeholder' => 'Apellido Materno', 
		'required'
	]) !!}
</div>
<div class="form-group">
	{!! Form::label('especialidad_id', 'Especialidades') !!}
	{!! Form::select('especialidad_id', $especialidades, null, [
    'class' => 'form-control',
    'placeholder' => 'Selecciona una especialidad', 
    'required'
  ]) !!}
</div>
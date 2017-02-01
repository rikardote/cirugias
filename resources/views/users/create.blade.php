<div class="form-group">
{!! Form::open(['route' => 'registrar.store', 'method' => 'POST']) !!}
   <div class="form-group">
	{!! Form::label('medico_id', 'Medico') !!}
	{!! Form::select('medico_id', $medicos, null, [
    'id' => 'medico_id',
    'class' => 'form-control',
    'placeholder' => 'Selecciona una Medico', 
    'required'
  ]) !!}
</div>
<div class="form-group">
	{!! Form::label('email', 'Email') !!}
	
	{!! Form::text('email', null, [
		
		'class' => 'form-control',
		'placeholder' => 'Email', 
		'required'
	]) !!}
</div>
<div class="form-group">
	{!! Form::label('password', 'Contraseña') !!}
	{!! Form::password('password', [
		'class' => 'form-control', 
		'placeholder'=>"**************",
		'required'
	]) !!}
</div>

<div class="form-group">
	{!! Form::label('type', 'Tipo') !!}
	{!! Form::select('type', ['member' => 'Miembro', 'admin' => 'Administrador'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opcion...']) !!}
</div>
	<div align="right">
	     {!! Form::submit("Crear Nuevo Usuario", ['class' => 'btn btn-success btn-block']) !!}
	</div>  
 {!! Form::close() !!}



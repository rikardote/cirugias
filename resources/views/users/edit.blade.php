{!! Form::model($user, ['route' => ['registrar.update', $user->id], 'method' => 'PATCH']) !!}


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
		'autocomplete' => 'new-password',
		'required'
	]) !!}
</div>

<div class="form-group">
	{!! Form::label('type', 'Tipo') !!}
	{!! Form::select('type', ['member' => 'Miembro', 'admin' => 'Administrador'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opcion...']) !!}
</div>
	<div align="right">
	     {!! Form::submit('Actualizar', ['class' => 'btn btn-success btn-block']) !!}
	</div>  
 {!! Form::close() !!}
	

	


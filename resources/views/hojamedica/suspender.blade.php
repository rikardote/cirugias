<strong>Paciente: </strong>


		{{ $surgery->paciente->fullname}} /{{ $surgery->paciente->tipo->code }}
		<br>

		{!! Form::open(['route' => ['hojamedica.suspender.post', $surgery->id], 'method' => 'POST', 'class' => 'datepickerform']) !!}
			@include('hojamedica.suspender_form')	
				<div align="right">
			     {!! Form::submit('Registrar', ['class' => 'btn btn-success']) !!}
			 	</div>
		{!! Form::close() !!}


		
	
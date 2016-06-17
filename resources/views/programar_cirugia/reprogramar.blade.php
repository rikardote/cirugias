
<strong>Paciente: </strong>


		{{ $surgery->paciente->fullname}} /{{ $surgery->paciente->tipo->code }}
		<br>

		{!! Form::open(['route' => ['programar_cirugia.store', $surgery->id], 'method' => 'POST', 'class' => 'datepickerform']) !!}
			@include('programar_cirugia.reprogramar_form')	
			{!! Form::submit('Registrar', ['class' => 'btn btn-success']) !!}
		{!! Form::close() !!}


		
	
	


<strong>Paciente: </strong>


		{{ $surgery->paciente->fullname}} /{{ $surgery->paciente->tipo->code }}
		<br>

		{!! Form::open(['route' => ['programar_cirugia.updatehorarios', $surgery->id], 'method' => 'PATCH', 'class' => 'datepickerform']) !!}
			@include('programar_cirugia.programarhorarios_form')	
				<div align="right">
			     {!! Form::submit('Registrar', ['class' => 'btn btn-success']) !!}
			 	</div>
		{!! Form::close() !!}


		

<strong>Paciente: </strong>


		{{ $surgery->paciente->fullname}} /{{ $surgery->paciente->tipo->code }}
		<br>

		{!! Form::open(['route' => ['reprogramar_cirugia.r_u_e', $surgery->id], 'method' => 'POST', 'class' => 'datepickerform']) !!}
			@include('programar_cirugia.reprogramar_form')	
				<div align="right">
			     {!! Form::submit('Registrar', ['class' => 'btn btn-success']) !!}
			 	</div>
		{!! Form::close() !!}


		
	
	

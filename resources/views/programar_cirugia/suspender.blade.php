<strong>Paciente: </strong>


		{{ $surgery->paciente->fullname}} /{{ $surgery->paciente->tipo->code }}
		<br>

		{!! Form::model($surgery, ['route' => ['cirugia.suspender.post', $surgery->id], 'method' => 'POST', 'class' => 'datepickerform']) !!}
		
			@include('programar_cirugia.suspender_form')	
				<div align="right">
			     {!! Form::submit('Registrar', ['class' => 'btn btn-success']) !!}
			 	</div>
		{!! Form::close() !!}


		
	
@extends('layouts.app')

@section('title', 'Programar Cirugia: ')

@section('content')
<strong>Pacientes: </strong>
	<br>
	<br>
@if($pacientes->count() == 1)

	@foreach($pacientes as $paciente)
		{{ $paciente->nombres }} {{ $paciente->apellido_pat }} {{ $paciente->apellido_mat }} /{{ $paciente->tipo->code }}
		<br>

		{!! Form::open(['route' => ['programar_cirugia.store', $date], 'method' => 'POST', 'class' => 'datepickerform']) !!}
			@include('programar_cirugia.form')
			{!! Form::submit('Registrar', ['class' => 'btn btn-success']) !!}
		{!! Form::close() !!}
	@endforeach

	
@else
@foreach($pacientes as $paciente)
 <a type="button" data-toggle="collapse" data-target="#{{$paciente->slug}}">
 		<li class="alert alert-success no-bullet">
 			{{ $paciente->nombres }} {{ $paciente->apellido_pat }} {{ $paciente->apellido_mat }} /{{ $paciente->tipo->code }}	
 		</li>
 </a>

  <div id="{{$paciente->slug}}" class="collapse">

	   {!! Form::open(['route' => ['programar_cirugia.store', $date], 'method' => 'POST', 'class' => 'datepickerform']) !!}
			@include('programar_cirugia.form')

			{!! Form::submit('Registrar', ['class' => 'btn btn-warning']) !!}
		{!! Form::close() !!}
		<br>
  </div>

@endforeach
 <hr>
 <br>

@endif

@endsection

@section('js')
	@foreach($pacientes as $paciente)
		 <script>
			$('#{{$paciente->rfc.$paciente->id}}').timepicker({ 
				'step': 60,
				'minTime': '7am',
          		'maxTime': '6pm',
			    'timeFormat': 'H:i',
			    'disableTextInput': true
			});
			
		</script> 
	@endforeach
	

@endsection
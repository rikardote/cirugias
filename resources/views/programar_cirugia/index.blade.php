@extends('layouts.app')

@section('title', 'Programar Cirugias')

@section('content')
	<div class="col-md-4">
	    <div id="datepicker" id="depart"></div>
	</div>

	  <div class="col-md-8">
	    <div class="panel-group">
	      <div class="panel panel-primary">
	        <div class="panel-heading">
	          <div align="center">
							<a data-url="{{ route('programar_cirugia.nueva', [$date]) }}" class="load-form-modal btn btn-primary" data-toggle ="modal" data-target='#form-modal'>+Programar Cirugia</a> 
              <div class="label label-warning pull pull-right">{{ fecha_dmy($date) }}</div>
              <div class="label label-warning pull pull-left"> Hay {{ $cirugias->count() }}  Citas</div>
						</div>
					</div>
							<table class="table table-condensed">
								<thead>
									<th>HORA</th>
									<th>SALA</th>
									<th>PACIENTE</th>
									<th>CIRUGIA</th>
								
								</thead>	
								<tbody>
									@foreach($cirugias as $cirugia)
										<small>
										<tr>
											<td class='font-small'>{{$cirugia->horario}}</td>
											<td class='font-small'>{{ ($cirugia->sala==4) ? 'Ext':$cirugia->sala }}</td>
											<td class='font-small'>{{$cirugia->paciente->fullname}} <br> {{$cirugia->paciente->rfc}} /{{$cirugia->paciente->tipo->code}} {{getEdad($cirugia->paciente->fecha_nacimiento)}} AÑOS<br> {{$cirugia->medico->fullname}}</td>
											<td class='font-small'>{{$cirugia->cirugia->name}} <br><br> {{$cirugia->anestesiologo->fullname}}</td>
										
										</tr>

									@endforeach
								</tbody>
							</table>
						
				</div>
			</div>
		</div>
	@include('partials.form-modal', ['title'=>'Programar cirugia para el: '.fecha_dmy($date)])
  @include('partials.confirmation_modal', ['title'=>'Confirmation Modal'])				
@endsection
@section('js')
 <script>
  $.datepicker.setDefaults($.datepicker.regional['es-MX']);
    $( "#datepicker" ).datepicker({
      dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        firstDay: 1,
        defaultDate: '{{ $date }}',
        onSelect: function () {
            var Path = window.location.pathname;
            window.open(Path + '?date=' + this.value, '_self',false);
        }
       
  });
    
  </script>



@endsection
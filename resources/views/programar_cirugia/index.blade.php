@extends('layouts.app')

@section('title', 'Programar Cirugias')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/flotante.css') }}">
@endsection

@section('content')
		<div class="social">
     	<ul>
            <li><a href="{{route('reportes.diarias.pdf', [$date])}}" class="icon-pdf"><i class="fa fa-file-pdf-o fa-2x "></i></a></li>
        </ul>
    </div>

	<div class="row">

	<div class="col-md-4">
	    <div id="datepicker" id="depart"></div>
	</div>

	  <div class="col-md-8">
	    <div class="panel-group">
	      <div class="panel panel-primary">
	        <div class="panel-heading">
	          <div align="center">
							<a data-url="{{ route('programar_cirugia.nueva', [$date]) }}" class="load-form-modal btn btn-primary" data-toggle ="modal" data-target='#form-modal'>+Programar Cirugia</a> 
              <div class="label-font label label-warning pull pull-right">{{ fecha_dmy($date) }}</div>
              <div class="label-font label label-warning pull pull-left"> Hay {{ $cirugias->count() }}  Cirugias</div>
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
										{{-- */($cirugia->urgencias==1) ? $color="#FEE483":$color="";/* --}}										
										<tr bgcolor="{{$color}}">
											<td class='font-small'>{{ ($cirugia->horario==0) ? 'Pend':$cirugia->horario }}</td>
											<td class='font-small'>{{ ($cirugia->sala==0) ? 'Pend':$cirugia->sala }}</td>
											<td class='font-small'>
											@if(!$cirugia->cerrada && !$cirugia->suspendida )
												
											
												<a data-url="{{ route('programar_cirugia.edit',[$cirugia->id]) }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>{{$cirugia->paciente->fullname}}
													<br> <small>{{$cirugia->paciente->rfc}} /{{$cirugia->paciente->tipo->code}}   ({{$cirugia->ubicacion}}) {{ ($cirugia->edad !=null ) ? $cirugia->edad." AÑOS":""  }}</small>
													<br> {{$cirugia->medico->fullname}}
 												</a>
 											@else
 												{{$cirugia->paciente->fullname}}
													<br> <small>{{$cirugia->paciente->rfc}} /{{$cirugia->paciente->tipo->code}}   ({{$cirugia->ubicacion}}) {{ ($cirugia->edad !=null ) ? $cirugia->edad." AÑOS":""  }}</small>
													<br> {{$cirugia->medico->fullname}}
																					
											@endif
											</td>

											<td class='font-small'>{{$cirugia->cirugia->name}} <br><br> {{$cirugia->anestesiologo->fullname}} <br> 
												<small>
													@if(!$cirugia->cerrada && $cirugia->horario && !$cirugia->suspendida )
														<a data-url="{{ route('cirugia.realizada',[$cirugia->id]) }}" class="load-form-modal  panelColorGreen label label-info" data-toggle ="modal" data-target='#form-modal'>Cerrar</a> | 
													@endif
													@if(!$cirugia->cerrada && !$cirugia->suspendida )
														<a data-url="{{ route('cirugia.reprogramar',[$cirugia->id]) }}" class="load-form-modal  panelColorGreen label label-success" data-toggle ="modal" data-target='#form-modal'>Reprogramar</a> | 
													
														<a data-url="{{ route('cirugia.suspender',[$cirugia->id]) }}" class="load-form-modal  panelColorGreen label label-danger" data-toggle ="modal" data-target='#form-modal'>Suspender</a>
													@endif
												@if($cirugia->cerrada)
										  		 <strong>CERRADA</strong>
										  		 <div class="pull pull-right">
										  		 	<a class="label label-warning" href="{{ route('cirugia.abrir',[$cirugia->id]) }}">Abrir</a>
										  		 </div>
										  		@endif
										  		@if($cirugia->suspendida)
										  		 <strong>SUSPENDIDA</strong>
										  		 <div class="pull pull-right">
										  		 	<a class="label label-warning" href="{{ route('cirugia.abrir',[$cirugia->id]) }}">Abrir</a>
										  		 </div>
										  		@endif
										  		</small>
											</td>
											@if(!$cirugia->cerrada && !$cirugia->suspendida)
												<td class="hover-btn">
									     		<a href="{{route('programar_cirugia.destroy', $cirugia->id)}}" type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
										  	</td>		
										  @endif
										</tr>

									@endforeach
								</tbody>
							</table>
						
				</div>
			</div>
		
		</div>
</div>  
@include('partials.form-modal', ['title'=>'Cirugia para el: '.fecha_dmy($date)])
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

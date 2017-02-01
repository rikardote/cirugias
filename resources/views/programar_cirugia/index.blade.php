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
											<td class='font-small'>{{$cirugia->horario}}</td>
											<td class='font-small'>{{ ($cirugia->sala==4) ? 'Ext':$cirugia->sala }}</td>

											<td class='font-small'>
											<a data-url="{{ route('programar_cirugia.edit',[$cirugia->id]) }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>{{$cirugia->paciente->fullname}}


											<br> {{$cirugia->paciente->rfc}} /{{$cirugia->paciente->tipo->code}}   ({{$cirugia->ubicacion}})<br> {{$cirugia->medico->fullname}}</td>
											 </a>
											<td class='font-small'>{{$cirugia->cirugia->name}} <br><br> {{$cirugia->anestesiologo->fullname}} <br> 
												@if(!$cirugia->reprogramada && !$cirugia->suspendida && !$cirugia->tiempo_qx)
												<small>
													<a data-url="{{ route('cirugia.realizada',[$cirugia->id]) }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>Cerrar</a> | 
													<a data-url="{{ route('cirugia.reprogramar',[$cirugia->id]) }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>Reprogramar</a> | 
													<a data-url="{{ route('cirugia.suspender',[$cirugia->id]) }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>Suspender</a>
												
												@endif
												@if($cirugia->cerrada)
										  		 <strong>CERRADA</strong>
										  		@endif
											</td>
											<td class="hover-btn">
									     		<a href="{{route('programar_cirugia.destroy', $cirugia->id)}}" type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
										  	</td>

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

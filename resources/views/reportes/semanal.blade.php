@extends('layouts.app')

@section('title', 'Reporte Semanal')

@section('content')
<table class="table">
		<tr>
			{!! Form::open(['route' => ['reportes.semanal.pdf'], 'method' => 'POST']) !!}	
			
			<td>
				
				<div class="form-group">
					 {!! Form::text('fecha_inicio', null, [
					    'class' => 'form-control',
					    'placeholder' => 'Fecha Inicial', 
					    'required',
					    'id' => 'datepicker_inicial'
					  ]) !!}
				</div>
		
						  
				  {!! Form::text('fecha_final', null, [
				   'class' => 'form-control',
				   'placeholder' => 'Fecha Final', 
				   'required',
				   'id' => 'datepicker_final'
				  ]) !!}
				  <br>
				{!! Form::submit('OK', ['class' => 'fa fa-search btn btn-success pull pull-right']) !!}

				
			</td>
			{!!Form::close()!!}
		</tr>
</table>
@endsection

@section('js')
	<script type="text/javascript">
		  $(function() {
		    $( "#datepicker_inicial1" ).datepicker();
		  });
		  </script>
		<script>
		$.datepicker.setDefaults($.datepicker.regional['es-MX']);
		$('#datepicker_inicial').datepicker({
		    dateFormat: 'dd/mm/yy',
		    changeMonth: true,
		    changeYear: true,
		    firstDay: 1,
		    onClose: function () {
		        $('#datepicker_final').val(this.value);
		    }
		});
		$('#datepicker_final').datepicker({
		    dateFormat: 'dd/mm/yy',
		    changeMonth: true,
		    changeYear: true,
		    firstDay: 1
		});
	</script> 
@endsection
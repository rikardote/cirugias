@if(isset($cirugia))
	
	<?php $estado = 'Actualizar';  ?>
	{!! Form::model($cirugia, ['route' => ['cirugias.update', $cirugia->id], 'method' => 'PATCH']) !!}
@else
	<?php $estado = 'Registrar';  ?>
	{!! Form::open(['route' => 'cirugias.store', 'method' => 'POST']) !!}
@endif
      @include('cirugias.form')
<div align="right">
     {!! Form::submit($estado, ['class' => 'btn btn-success']) !!}
 </div>
    {!! Form::close() !!}


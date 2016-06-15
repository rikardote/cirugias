@if(isset($anestesiologo))
	
	<?php $estado = 'Actualizar';  ?>
	{!! Form::model($anestesiologo, ['route' => ['anestesiologos.update', $anestesiologo->id], 'method' => 'PATCH']) !!}
@else
	<?php $estado = 'Registrar';  ?>
	{!! Form::open(['route' => 'anestesiologos.store', 'method' => 'POST']) !!}
@endif
      @include('anestesiologos.form')
<div align="right">
     {!! Form::submit($estado, ['class' => 'btn btn-success']) !!}
 </div>
    {!! Form::close() !!}


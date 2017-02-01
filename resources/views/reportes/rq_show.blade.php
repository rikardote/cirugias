<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Document</title>
	<style>
		 body {
	     	font-size: 8pt;
	     }
	     td{
	     	padding-left: 5px;
	     	padding-right: 5px;
	     }
	</style>
</head>
<body>
	<table border="1" cellpadding="0" cellspacing="0" style="width:100%;">
		<tr>
			<thead>
				<td>Fecha Original</td>
				<td>Fecha Reprogramada</td>
				<td>Medico</td>
				<td>Cirugia</td>
				<td>Observaciones</td>
			</thead>
		</tr>
		<tbody>
			@foreach($surgerys as $surgery)
				@if	(check_rezago($surgery->fecha, $surgery->fecha_repro) && !$surgery->cerrada)
				<tr>
					<td>{{fecha_dmy($surgery->fecha_repro)}}</td>
					<td>{{fecha_dmy($surgery->fecha)}}</td>
					<td>{{$surgery->medico->fullname}}</td>
					<td>{{$surgery->cirugia->name}}</td>
					<td> {{$surgery->observaciones}}</td>
				</tr>
				@endif
			@endforeach
		</tbody>
	</table>
	
</body>
</html>
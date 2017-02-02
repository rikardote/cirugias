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
				<td>Fecha</td>
				<td>Hora de prog. y Sala</td>
				<td>Cirugia Proyectada</td>
				<td>Tiempo de Qx Proyectado</td>
				<td>Cirujano</td>
				<td>Anestesiologo</td>
				<td>Hora Real</td>
				<td>Cirugia realizada</td>
				<td>Hora Final</td>
				<td>R</td>
				<td>S</td>
				<td>U</td>
				<td>Observaciones</td>
			</thead>
		</tr>
		<tbody>
			@foreach($surgerys as $surgery)
				<tr>
					<td>{{fecha_dmy($surgery->fecha)}}</td>
					<td>{{($surgery->horario != null) ? $surgery->horario:""}}/{{($surgery->sala != null) ? $surgery->sala:""}}</td>
					<td>{{$surgery->cirugia->name}}</td>
					<td>{{($surgery->tiempo_qx != null) ? $surgery->tiempo_qx:""}}</td>
					<td>{{$surgery->medico->fullname}}</td>
					<td>{{$surgery->anestesiologo->fullname}}</td>
					<td>{{$surgery->hora_inicio}}</td>
					<td>{{($surgery->cirugia_id == $surgery->cirugia_realizada) ? $surgery->cirugia->name : getCirugia($surgery->cirugia_realizada)  }}</td>
					<td>{{$surgery->hora_final}}</td>
					<td align="center">{{($surgery->reprogramada ? √:null)}}</td>
					<td align="center">{{($surgery->suspendida ? √:null)}}</td>
					<td align="center">{{($surgery->urgencias ? √:null)}}</td>
					<td> {{$surgery->observaciones}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
</body>
</html>
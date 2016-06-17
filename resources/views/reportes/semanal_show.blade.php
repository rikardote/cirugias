<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table border="1" cellpadding="5" cellspacing="0" style="width:100%;">
		<tr>
			<thead>
				<td>Hora de programacion y Sala</td>
				<td>Cirugia Proyectada</td>
				<td>Tiempo de Qx Proyectado</td>
				<td>Cirujano</td>
				<td>Anestesiologo</td>
				<td>Hora Real</td>
				<td>Cirugia realizada</td>
				<td>Hora Final</td>
			</thead>
		</tr>
		<tbody>
			@foreach($surgerys as $surgery)
				<tr>
					<td>{{$surgery->horario}}/{{$surgery->sala}}</td>
					<td>{{$surgery->cirugia->name}}</td>
					<td>{{$surgery->tiempo_qx}}</td>
					<td>{{$surgery->medico->fullname}}</td>
					<td>{{$surgery->anestesiologo->fullname}}</td>
					<td>{{$surgery->hora_inicio}}</td>
					<td>{{ getCirugia($surgery->cirugia_realizada) }}</td>
					<td>{{$surgery->hora_final}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
</body>
</html>
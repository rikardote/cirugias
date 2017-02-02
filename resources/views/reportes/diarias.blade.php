<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
<body>
<table border="1" cellpadding="5" cellspacing="0" style="width:100%;">
	<thead>
	<tr>
		<th align="left">HORA</th>
		<th align="left">SALA</th>
		<th align="left">PACIENTE</th>
		<th align="left">CIRUGIA</th>
	</tr>	
	</thead>
	<tbody>
		@foreach($cirugias as $cirugia)
			
			<tr>
				<td class='font-small' valign=top>{{$cirugia->horario}}</td>
				<td class='font-small' valign=top>{{ ($cirugia->sala==0) ? "":$cirugia->sala }}</td>
				<td class='font-small'>{{$cirugia->paciente->fullname}} <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$cirugia->paciente->rfc}} /{{$cirugia->paciente->tipo->code}} ({{$cirugia->ubicacion}})
					{{ ($cirugia->edad !=null ) ? $cirugia->edad." AÑOS":""  }}
				<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$cirugia->medico->fullname}}</td>
				<td class='font-small'>{{$cirugia->cirugia->name}} <br><br> {{$cirugia->anestesiologo->fullname}} </td>
			</tr>

		@endforeach
	</tbody>
</table>
</body>
</html>

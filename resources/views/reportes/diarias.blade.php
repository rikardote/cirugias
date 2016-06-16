<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="{{ asset('css/themesolar.css') }}">
</head>
<body>
<table  border="0" cellpadding="5" cellspacing="2" style="width:100%;">
	<tr>
		<th align="left">HORA</th>
		<th align="left">SALA</th>
		<th align="left">PACIENTE</th>
		<th align="left">CIRUGIA</th>
	</tr>	
		@foreach($cirugias as $cirugia)
			
			<tr class="border_bottom">
				<td class='font-small'>{{$cirugia->horario}}</td>
				<td class='font-small'>{{ ($cirugia->sala==4) ? 'Ext':$cirugia->sala }}</td>
				<td class='font-small'>{{$cirugia->paciente->fullname}} <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$cirugia->paciente->rfc}} /{{$cirugia->paciente->tipo->code}} {{getEdad($cirugia->paciente->fecha_nacimiento)}} AÑOS<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$cirugia->medico->fullname}}</td>
				<td class='font-small'>{{$cirugia->cirugia->name}} <br><br> {{$cirugia->anestesiologo->fullname}} </td>
			</tr>

		@endforeach
	
</table>
</body>
</html>

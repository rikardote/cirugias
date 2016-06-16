<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="{{ asset('css/themesolar.css') }}">
</head>
<body>
<table class="test" border="1" cellpadding="5" cellspacing="0" style="width:100%;">
	<tr>
		<th align="left">HORA</th>
		<th align="left">SALA</th>
		<th align="left">PACIENTE</th>
		<th align="left">CIRUGIA</th>
	</tr>	
		@foreach($cirugias as $cirugia)
			
			<tr>
				<td class='font-small' valign=top>{{$cirugia->horario}}</td>
				<td class='font-small' valign=top>{{ ($cirugia->sala==4) ? 'Ext':$cirugia->sala }}</td>
				<td class='font-small'>{{$cirugia->paciente->fullname}} <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$cirugia->paciente->rfc}} /{{$cirugia->paciente->tipo->code}} {{getEdad($cirugia->paciente->fecha_nacimiento)}} AÑOS<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$cirugia->medico->fullname}}</td>
				<td class='font-small'>{{$cirugia->cirugia->name}} <br><br> {{$cirugia->anestesiologo->fullname}} </td>
			</tr>

		@endforeach
	
</table>
</body>
</html>

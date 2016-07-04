<DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Lista de Usuarios en proyecyo </title>
	
</head>
<body>

	<h1>Listado de usuarios</h1>
	<h2>Proyecto; {{$proyecto->descripcion}}</h2>
	<hr>
	<table>
			
		<tr>
			<td>Nombre</td>
			<td>Edad</td>
		</tr>
		
		@foreach($usuario as $u)
		<tr>
			<td>{{$u->nombre}}</td>
			<td>{{$u->edad}}</td>
			
		</tr>
		@endforeach

	</table>	


</body>
</html>
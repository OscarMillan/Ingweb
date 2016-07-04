
	
		@extends('master')
		@section('encabezado')
		<h1>seccion de usuarios</h1>
		@stop

		@section('contenido')




				<a href="{{url('registrarUsuario')}}" class="btn btn-success"> Nuevo Usuario <span class="glyphicon glyphicon-plus" aria-hiden="true"> </span> </a>	

				<table class="table table-hover">
				<thead>
				<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Edad</th>
				<th>Correo	</th>
				</tr>
				</thead>

					<tbody>

						@foreach($usuario as $u)
						<tr>
							<td>{{$u->id}}</td>
							<td>{{$u->nombre}}</td>
							<td>{{$u->edad}}</td>
							<td>{{$u->correo}}</td>
							
							
							<td> <a class="btn btn-danger btn -xs" href="{{url('eliminarUsuario')}}/{{$u->id}}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Eliminar <a> <td>
							
							<td> <a class="btn btn-primary btn -xs" href="{{url('modificarUsuario')}}/{{$u->id}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar<a> <td>		

						</tr>	
						@endforeach

					</tbody>

				</table>

			
@stop
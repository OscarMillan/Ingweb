<@extends('master')
@section('encabezado')
<h1>asignar usuarios</h1>
@stop
@section('contenido')
	
		<div class="row">
			<div class="col-xs-12">
				<form action="{{url('/seleccionarUsuarios')}}" method="POST">
					<input type="hidden" name="_token" value="{{csrf_token() }}">
					<div class="form-group">
						<label for=""> Proyectos: </label>
						<select class="form-control" name="proyectos" id="">
							@foreach($proyectos as $p)
							<option value="{{$p->id}}">{{$p->descripcion}}</option>
							@endforeach
						</select>
							<input class="btn btn-primary" type="submit" value="Mostrar">

					</div>  
					</form>

					<form action="{{url('/actualizarUsuariosProyectos')}}/{{$id}}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token() }}">
					<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Nombre</th>
							<th>Edad</th>
							<th>Correo</th>
							<th>Seleccionar</th>
						</tr>
					</thead>  
						<tbody>
							@foreach ($usuario as $u)
							<tr>
								<td>{{$u->id}}</td>
								<td>{{$u->nombre}}</td>
								<td>{{$u->edad}}</td>
								<td>{{$u->correo}}</td>
								<td> <input type="checkbox" name="seleccionados[]" value="{{$u->id}}"> </td>
							</tr>
							@endforeach
							
							
							

						</tbody>

					</table>
					<tr class="text-center">
					<td colspan="5"> 
					<input class="btn btn-success" type="submit" value="Agregar">
					</td>
					</tr>

					</form>

				

				
@stop
				

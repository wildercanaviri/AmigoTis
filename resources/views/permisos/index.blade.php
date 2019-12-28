
@extends("../layout/plantilla")
@section("cabecera")
 @include("../permisos/menu")
 <h2 style="color: white;">ESTA ES LA VISTA DE AMINISTRADOR-PESTAÑA PERMISOS</h2> 
@endsection
@section("contenido")

<table border="1" class="table table-hover">
<thead class="bg-warning">
<td>  Id </td>
<td>Permiso</td>
<td>Descripción</td>

</thead>
  @foreach($permisos as $permiso) 
    <tr>
    <td>{{$permiso->id}}</td>
    <td>{{$permiso->name}}</td>
    <td>{{$permiso->description}}</td>
  
  </tr>

</tr>
@endforeach
</table>
@endsection
@extends("../layout/plantilla")
@section("cabecera")
  @include("../roles/menu")
  <h2 style="color: white;">ESTA ES LA VISTA DE AMINISTRADOR-PESTAÑA Roles/Editar Roles</h2> 
@endsection
@section("contenido")

<form action="/roles/{{$rol->id}}" method="post" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PUT">
    <table>
    <tr>
    <td>Rol</td>
    <td>
      <select name="role_id" >
         
            <option value="{{$rol->id}}">{{$rol->name}} </option>
      </select>
    </td>
    </tr>
     
    <tr>
    <td>Permisos</td>
      <td>
        @foreach($permisos as $permiso)
        
        <label for="permisos">
            <input type="checkbox" id="permiso" name="permisos[]" value="{{$permiso->id}}"
            {{in_array($permiso->name,$permis)?"checked":""}}>{{$permiso->name}}
        </label>
        <br>
        @endforeach
      </td>
    </tr>
     
    <th>
        <td colspan="2" align="center">
          <input type="submit" name="enviar" id="enviar" value="ASIGNAR"style= background-size: cover; height: 40px; width: 241px;margin-top: 50px; margin-left: 30px;>
        </td>
    </th>
    
</table>
</form>
    

@endsection
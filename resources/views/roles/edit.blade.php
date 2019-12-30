@extends("../layout/plantilla")
@section("cabecera")
  @include("../roles/menu")
  <br> 
@endsection
@section("contenido")

<form action="/roles/{{$rol->id}}" method="post" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PUT">
    <table style="background-color: transparent; ">
    <tr>
    <td id="idCampo">Rol</td>
    <td>
      <select class="form-control" name="role_id" >
          <option value="{{$rol->id}}">{{$rol->name}} </option>
      </select>
    </td>
    </tr>
     
    <tr>
    <td  id="idCampo">Permisos</td>
      <td>
        @foreach($permisos as $permiso)
        
        <label id="idCampo" for="permisos">
            <input type="checkbox" id="permiso" name="permisos[]" value="{{$permiso->id}}"
            {{in_array($permiso->name,$permis)?"checked":""}} style="position: relative !important; visibility: visible !important; margin-left: 20px; width: 20px; height: 20px;">{{$permiso->name}}
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
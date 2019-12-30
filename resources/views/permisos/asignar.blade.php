@extends("../layout/plantilla")
@section("cabecera")
  @include("../permisos/menu")
  <h2 style="color: white;">ESTA ES LA VISTA DE AMINISTRADOR-PESTAÑA ROLES/asignar permisos</h2> 
@endsection
@section("contenido")

<form action="/permisos/asignacion/ui" method="post">
    {{csrf_field()}}
    <table style="background-color: transparent;">
    <tr>
    <td id="idCampo">Rol</td>
    <td>
      <select class="form-control" name="role_id" >
          <option value="vacio">    </option>
        @foreach($roles as $rol)
          <option value="{{$rol->id}}">{{$rol->name}} </option>
        @endforeach
      </select>
    </td>
    </tr>
     
    <tr>
    <td id="idCampo">Permisos</td>
      <td>
        <br>
        @foreach($permisos as $permiso)
        
        <label for="permisos" style="color: white;">
            <input type="checkbox" id="permiso" name="permisos[]" value="{{$permiso->id}}" style="position: relative !important; visibility: visible !important; margin-left: 20px; width: 20px; height: 20px;">{{$permiso->name}}
        </label>
        <br>
        @endforeach
      </td>
    </tr>
     
    <th>
        <td colspan="2" align="center">
          <input type="submit" name="enviar" id="enviar" value=""style= "background-image: url('{{asset('assets/img/botonGuardarAsignacion.png')}}'); 
                          background-size: cover; height: 40px; width: 241px;margin-top: 50px; margin-left: 30px;">
        </td>
    </th>
    
</table>
</form>
@endsection
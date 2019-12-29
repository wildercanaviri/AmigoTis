@if (Auth::guest())
  <script>window.location = "/login";</script>
@else
@extends("../layout/plantilla")
@section("cabecera")
  @include("../roles/menu")
  <h2 style="color: white;">ESTA ES LA VISTA DE AMINISTRADOR-PESTAÑA ROLES</h2> 
@endsection
@section("contenido")
    <input type="submit" class="form-control" value="" onclick = "location='/roles/create'"
     style="background-image: url('{{asset('assets/img/botonCrearRol.png')}}'); 
                background-size: contain; height: 40px; width: 143px;margin-left: 200px;margin-bottom: 10px; margin-top: 30px;"  />
    <input type="submit" class="form-control" value="" onclick = "location='/permisos/asignacion'" style="background-image: url('{{asset('assets/img/botonAsignarPermisos.png')}}'); background-size: cover; 
                height: 40px; width: 200px;margin-left: 200px;margin-bottom: 10px; margin-top: 30px;"  >
    <table border="1" class="table table-hover">
      <thead class="bg-warning">
        <td>Código</td>
        <td>Nombre de Rol</td>
        <td>Permisos</td>
        <td>Modificar</td>
      </thead>
    @foreach($roles as $role)
        <tr>
            <td>{{$role->id}}</td>
            <td>{{$role->name}}</td>
            <td>
                 @foreach($role->permissions as $permiso)
                   {{$permiso->name}}
                   <br>
                 @endforeach
             </td>
            <td> 
              
                <a href="/roles/ <?php echo $role->id; ?>">Ver</a>
                <a href="/roles/ <?php echo $role->id; ?> /edit">Editar</a>
                <a href="/roles/delete/ <?php echo $role->id; ?>">Eliminar</a></td>
            
        </tr>
    @endforeach
    </table>
@endsection

               
               
@endif
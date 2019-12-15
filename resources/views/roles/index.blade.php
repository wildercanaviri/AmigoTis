@if (Auth::guest())
  <script>window.location = "/login";</script>
@else
@extends("../layout/plantilla")
@section("cabecera")
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(255,192,0);">
                  
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
              
                  <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8000/inicio" >Inicio</a>
                      </li>
                      
                       <li class="nav-item">
                       <a class="nav-link" href="http://localhost:8000/correo">Cartas de niños</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8000/usuarios" >Usuarios</a>
                      </li>
                      <li class="nav-item active">
                        <a class="nav-link" href="http://localhost:8000/roles" style="text-decoration: underline;">Roles<span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item ">
            <a class="nav-link" href="http://localhost:8000/permisos">Permisos</a>
          </li>
          <li class="nav-item ">
                        <a class="nav-link" href="http://localhost:8000/crearBoletin">Edición de Boletines</a>
                      </li>
                    </ul>
                  </div>
                </nav>
                <h2 style="color: white;">ESTA ES LA VISTA DE AMINISTRADOR-PESTAÑA ROLES</h2> 
@endsection
@section("contenido")
    <input type="submit" value="" onclick = "location='/roles/create'" style="background-image: url('{{asset('assets/img/botonCrearRol.png')}}'); 
                background-size: contain; height: 40px; width: 143px;margin-left: 200px;margin-bottom: 10px; margin-top: 30px;"  />
                 <input type="submit" value="" onclick = "location='/permisos/asignacion'" style="background-image: url('{{asset('assets/img/botonAsignarPermisos.png')}}'); 
                background-size: cover; 
                height: 40px; width: 200px;margin-left: 200px;margin-bottom: 10px; margin-top: 30px;"  >
    <table border="1">
        <thead>
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
              
                <a href="http://localhost:8000/roles/ <?php echo $role->id; ?>">Ver</a>
                <a href="http://localhost:8000/roles/ <?php echo $role->id; ?> /edit">Editar</a>
                <a href="http://localhost:8000/roles/delete/ <?php echo $role->id; ?>">Eliminar</a></td>
            
             
        </tr>
    @endforeach
    </table>
        
                    
@endsection

               
               
@endif
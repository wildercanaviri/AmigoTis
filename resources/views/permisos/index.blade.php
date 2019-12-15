
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
                        <a class="nav-link" href="http://localhost:8000/usuarios">Usuarios</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8000/roles">Roles</a>
                      </li>
                      
                      <li class="nav-item active">
                        <a class="nav-link" href="http://localhost:8000/permisos" style="text-decoration: underline;">Permisos</a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="http://localhost:8000/crearBoletin">Edición de Boletines</a>
                      </li>
                     
                    
                    </ul>
                  </div>
                </nav>
                <h2 style="color: white;">ESTA ES LA VISTA DE AMINISTRADOR-PESTAÑA PERMISOS</h2> 
@endsection
@section("contenido")

<table border="1">
<thead>
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
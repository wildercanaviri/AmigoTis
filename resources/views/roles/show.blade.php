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
                     <li class="nav-item active">
                        <a class="nav-link" href="http://localhost:8000/usuarios" style="text-decoration: underline;">Usuarios<span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="http://localhost:8000/roles">Roles</a>
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
@endsection
@section("contenido")
 <div class="container">
  <div class="row">
    <div class="form-group" class="col-8" >
      <label for="nombre_rol" style="color: white;">Nombre Rol </label>
      <input type="text" class="form-control" id="nombre_rol" readonly placeholder = "{{$rol->name}}">
    </div>
    <div class="form-group" class="col-8" >
      <label for="description" style="color: white;">Descripcion Rol </label>
      <input type="text" class="form-control" id="description" readonly placeholder = "{{$rol->description}}">
    </div>
   	@foreach ($rol->permissions as $permiso)
    <div class="form-group" class="col-8" >
      <label for="{{$permiso->name}}" style="color: white;"> </label>
      <input type="text" class="form-control" id="{{$permiso->name}}" readonly placeholder = "{{$permiso->name}}">
    </div>		
    <div class="form-group" class="col-8" >
      <label for="{{$permiso->description}}" style="color: white;"> </label>
      <input type="text" class="form-control" id="{{$permiso->description}}" readonly placeholder = "{{$permiso->description}}">
    </div>	
	@endforeach
   </div>
  </div>
    

    


  
 
   
@endsection





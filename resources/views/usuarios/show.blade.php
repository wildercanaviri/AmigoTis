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
    <from>
    <div class="form-group" class="col-6" >
      <label for="nombre_usu" style="color: white;">Nombre de Usuario</label>
      <input type="text" class="form-control" id="nombre_usu" readonly placeholder = "{{$usuario->nom_usu}}">
    </div>
    <div class="form-group" class="col-6">
      <label for="apellido_usu" style="color: white;">Apellido de Usuario</label>
      <input type="text" class="form-control" id="apellido_usu" readonly placeholder="{{$usuario->ape_usu}}">
    </div>
    <div class="form-group" class="col-6">
      <label for="email" style="color: white;">Email </label>
      <input type="text" class="form-control" id="email" readonly placeholder="{{$usuario->email}}">
    </div>
    <div class="form-group" class="col-6">
      <label for="fecha_naci" style="color: white;">Fecha de Nacimiento</label>
      <input type="text" class="form-control" id="fecha_naci" readonly placeholder="{{$usuario->fecha_nac}}">
    </div>
    <div class="form-group"class="col-6">
      <label for="telefono" style="color: white;">Telefono </label>
      <input type="text" class="form-control" id="fecha_naci" readonly placeholder="{{$usuario->tel_usu}}">
    </div>
    <div class="form-group" >
       <label for="rol" style="color: white;">Roles</label>
      @foreach($usuario->roles as $rol)
        <input type="text" class="form-control" id="rol" readonly placeholder="{{$usuario->roles}}">
      @endforeach    
    </div>
   </from>
   </div> 
  </div>
    
    
    
    


  
 
   
@endsection
@if (Auth::guest())
  <script>window.location = "/login";</script>
@else
@extends("../layout/plantilla")
@section("cabecera")
@endsection
@section("contenido")
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
<h2 style="color: white;">Información Personal</h2>
        <form action="/informacionPersonal/editar" method="post"> 
        {{csrf_field()}}   
        <div class="" style="color: white; font-weight: bold;">
              <div style="width: 50%;">
                  <input type="text" name="id" value="{{Auth::user()->id}}" hidden>
                   
                   <div style="margin-top: 20px; text-align: center;">
                      <label style="margin-right: 37px;">Nombre</label>
                      <input type="text" name="nom_usu" value="{{Auth::user()->nom_usu}}">
                   </div>
                   <div style="margin-top: 20px; text-align: center;">
                      <label style="margin-right: 37px;">Apellido</label>
                      <input type="text" name="ape_usu" value="{{auth()->user()->ape_usu}}">
                   </div>
                   <div style="margin-top: 20px; text-align: center;">
                      <label style="margin-right: 47px;">Correo</label>
                      <input type="text" name="email" value="{{auth()->user()->email}}">
                   </div>
                   <div style="margin-top: 20px; text-align: center;">
                      <label>Fecha de Nac.</label>
                      <input type="text" name="fecha_nac" value="{{Auth::user()->fecha_nac}}">
                   </div>
                   <div style="margin-top: 20px; text-align: center;">
                      <label style="margin-right: 35px;">Telefono</label>
                      <input type="text" name="tel_usu" value="{{Auth::user()->tel_usu}}">
                   </div>
                   <!--
                   <div style="margin-top: 20px; text-align: center;">
                      <label style="margin-right: 35px;">Dirección</label>
                      <input type="text" name="username" value="{{Auth::user()->nom_usu}}">
                   </div>
-->
              </div>
               
                <div>
                  <input type="submit" value="" onclick = "location='/configuracion/editar'" style="background-image: url('{{asset('assets/img/botonEditar.png')}}'); 
                    background-size: contain; height: 40px; width: 143px;margin-left: 200px;margin-bottom: 10px; margin-top: 30px;" />
                </div>
              
        </div>
        </form>


@endsection
@endif
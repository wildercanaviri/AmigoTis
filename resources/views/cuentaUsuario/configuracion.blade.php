@if (Auth::guest())
  <script>window.location = "/login";</script>
@else
@extends("../layout/plantilla")
<style type="text/css">
  .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
  margin-top: 20px;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
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
<h2 style="color: white;">Configuración de mi Cuenta</h2>
  <div class="" style="color: white; font-weight: bold;">
      <div style="width: 50%;">
          <div style="text-align: center;">
                <label style="margin-left: -70px;margin-top: 20px;">Permitir Notificaciones &nbsp &nbsp &nbsp</label>
                <label class="switch">
                <input type="checkbox" checked>
                <span class="slider round"></span>
                </label>
          </div>

            <form action="/configuracion/usuario" method="post">
            {{csrf_field()}} 
            <input type="text" name="id" value="{{Auth::user()->id}}" hidden>   
                  <div style="margin-top: 20px; text-align: center;">
                        <label>Nombre de Usuario</label>
                        <input type="text" name="username" value="{{Auth::user()->username}}">
                  </div>
                  
                   <div style="text-align: center;">
                        <label style="margin-right: 63px;">Contraseña</label>
                        <input type="password" name="password" value="{{Auth::user()->password}}">
                  </div>
    
                <div>
                    <input type="submit" value=""style="background-image: url('{{asset('assets/img/botonEditar.png')}}'); 
                      background-size: contain; height: 40px; width: 143px;margin-left: 200px;margin-bottom: 10px; margin-top: 30px;" />
                </div>
                
            </form>

            <div>      
                    <form method="post" action="/configuracion/eliminar">
                        {{csrf_field()}}
                      <input type="text" name="id" value="{{Auth::user()->id}}" hidden> 
                          <input type="submit" value="" style="background-image: url('{{asset('assets/img/botonEliminarMiCuenta.png')}}'); 
                            background-size: contain; height: 40px; width: 220px;margin-left: 200px;margin-bottom: 10px; margin-top: 30px;" />
                    </form>
              </div>
    </div>
                           

</div>

@endsection
@endif
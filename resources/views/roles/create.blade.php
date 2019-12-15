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
                        <a class="nav-link" href="http://localhost:8000/usuarios">Usuarios</a>
                      </li>
                       <li class="nav-item active">
                        <a class="nav-link" href="http://localhost:8000/roles" style="text-decoration: underline;">Roles<span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="http://localhost:8000/permisos" >Permisos</a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="http://localhost:8000/crearBoletin">Edición de Boletines</a>
                      </li>
                    </ul>
                  </div>
                </nav>
                <h2 style="color: white;">ESTA ES LA VISTA DE AMINISTRADOR-PESTAÑA ROLES/crea roles</h2> 
@endsection
@section("contenido")

<form action="/roles" method="post" style="background: transparent; width: 90%;">
  <table style="font-size: 16px;font-weight: bold; background: transparent; width: 90%;margin: 20px auto;">

    <tr>
      <td id="idCampo">Nombre de rol: </td>
      <td>
        <input type="text" name="nom_rol" required>
          {{csrf_field()}}
      </td>
    </tr>

    <tr>
      <td id="idCampo">Descripcion del rol: </td>
      <td>
        <input type="text" name="descripcion" required>
      </td>
    </tr>

    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="enviar" value="" style="background-image: url('{{asset('assets/img/botonGuardarRol.png')}}'); background-size: contain; height: 40px; width: 189px;margin-top: 50px; margin-left: 30px;">
      </td>
    </tr>
  </table>
</form>
@endsection
@endif
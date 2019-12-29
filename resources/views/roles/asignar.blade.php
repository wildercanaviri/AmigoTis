@extends("../layout/plantilla")
@section("cabecera")
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(255,192,0);">
                  
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
              
                  <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" href="/inicio" >Inicio</a>
                      </li>
                
                      <li class="nav-item">
                        <a class="nav-link" href="/correo">Cartas de niños</a>
                      </li>    
                     
                      <li class="nav-item active">
                        <a class="nav-link" href="/usuarios" style="text-decoration: underline;">Usuarios<span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="/roles">Roles</a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="/permisos">Permisos</a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="/crearBoletin">Edición de Boletines</a>
                      </li>
                      
                    </ul>
                  </div>
                </nav>
                <h2 style="color: white;">ESTA ES LA VISTA DE AMINISTRADOR-PESTAÑA USUARIOS/asignar roles</h2> 
@endsection
@section("contenido")

<form action="/roles/asignacion/unir" method="post">
    {{csrf_field()}}
    <table style="background-color: transparent; margin-top: 30px;">
     
        <tr>
          <td id="idCampo">Usuario</td>
          <td>
            <select name="user_id">
                <option value="vacio">    </option>
              @foreach($usuarios as $usuario)
               
                    <option value="{{$usuario->id}}">{{$usuario->nom_usu}} {{$usuario->ape_usu}} </option>
                
                @endforeach
            </select>
          </td>
        </tr>
        
        <tr>
        <td id="idCampo">Rol</td>
            <td>
             
                    @foreach($roles as $role)
                  
                  <label for="roles" id="idCampo">
                      <input type="checkbox" id="rol" name="roles[]" value="{{$role->id}}" style="position: relative !important; visibility: visible !important; margin-left: 20px; width: 20px; height: 20px;">&nbsp{{$role->name}}
                  </label>
                  <br>
                  @endforeach 
             
            </td>
        </tr>
          
        <th>
            <td colspan="2" align="center">
              <input type="submit" name="enviar" id="enviar" value=""style="background-image: url('{{asset('assets/img/botonGuardarAsignacion.png')}}'); 
                          background-size: cover; height: 40px; width: 241px;margin-top: 50px; margin-left: 30px;">
            </td>
        </th>

    </table>
</form>

@endsection
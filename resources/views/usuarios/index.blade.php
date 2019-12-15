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
                <h2 style="color: white;">ESTA ES LA VISTA DE AMINISTRADOR-PESTAÑA USUARIOS</h2> 
@endsection
@section("contenido")

<form id="formularioBuscadorCartas" action="/usuarios"  method="get">
      <div style="position: absolute;right: 200px; background-color: white; width: 220px;">  
        <input id="buscar" name="buscar" type="text" placeholder="Buscar usuario" aria-describedby="buscador" style="border: 0px;">
        <button type="submit" style=" background-color: white;">
          <img id="lupa" src="{{asset('assets/img/lupa.png')}}" height="25px" width="30px"/>
        </button>
      </div>
  </form> 

<!--
<div class="col-8" style="width:30%">
  <div class="input-group">
    <input class="form-control mr-sm-2" id="buscar" type="text" placeholder="Buscar usuario" aria-describedby="buscador">
    <button type="submit" class="btn btn-warning">Buscar</button>
    </div>
</div>
-->
    <br>
    <input type="submit" value="" onclick = "location='/usuarios/create'" style="background-image: url('{{asset('assets/img/botonCrearCuenta.png')}}'); 
                background-size: contain; height: 40px; width: 143px; margin-top: 30px;margin-left: 200px; margin-bottom: 10px;" />
    <input type="submit" value="" onclick = "location='/roles/asignacion'" style="background-image: url('{{asset('assets/img/botonAsignarRoles.png')}}'); 
                background-size: contain; height: 40px; width: 143px;margin-left: 200px;margin-bottom: 10px;"/>
    <br>
    <table border="1" >
        <thead>
            <td>Código</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Correo</td>
            <td>Roles</td>
            <td>Modificar</td>
        </thead>
    @foreach($usuarios as $usuario)
        <tr>
            <td>{{$usuario->id}}</td>
            <td>{{$usuario->nom_usu}}</td>
            <td>{{$usuario->ape_usu}}</td>
            <td>{{$usuario->email}}</td>
            <td>
              @php
              foreach($usuario->roles as $role){
              echo '<p>'. $role->name . '</p>';
               }
              @endphp
            </td>
            <td>
              <a href="http://localhost:8000/usuarios/ <?php echo $usuario->id; ?>">Ver </a>
              <a href="http://localhost:8000/usuarios/ <?php echo $usuario->id; ?> /edit">Editar</a> 
                
                <!--<form method="post" action="/usuarios/{{$usuario->id}}">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" Value="DELETE">
                    <input type="submit" value="Eliminar">
                </form>
                -->
              <a href="http://localhost:8000/usuarios/delete/ <?php echo $usuario->id; ?>">Eliminar</a>
              <a href="{{route('informacion.create',$usuario->id)}}">Informacion</a>  
            </td>
             
        </tr>
    @endforeach

    {{!! $usuarios->links() !!}}    

    </table>
    
    <script>
      window.addEventListener("load",function(){
        document.getElementById("buscar").addEventListener("keyup",()=>{

            if((document.getElementById("buscar").value.length)>=1)
              fecth('/usuarios/buscador?buscar=${document.getElementById("texto").value}',{ method:'get'})
                .then(response =>response.text())
                .then(html =>{document.getElementById("resultados").innerHTML=html})
            else
              document.getElementById("resultados").innerHTML=""
        })
      })
    </script>
    
@endsection

@endif
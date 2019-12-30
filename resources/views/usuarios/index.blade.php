@if (Auth::guest())
  <script>window.location = "/login";</script>
@else
@extends("../layout/plantilla")
@section("cabecera")
  @include("../usuarios/menu")
  <h2 style="color: white;">ESTA ES LA VISTA DE AMINISTRADOR-PESTAÑA USUARIOS</h2> 
@endsection
@section("contenido")

<div class="container">
  <section class="row">
  <div class="col-sm-3">
    <input type="submit" value="" onclick = "location='/usuarios/create'" class="form-control" style="background-image: url('{{asset('assets/img/botonCrearCuenta.png')}}'); 
    background-size: contain; height: 40px; width: 143px;" />
  </div>

  <div class="col-sm-3">
    <input type="submit" value="" onclick = "location='/roles/asignacion'" class="form-control" style="background-image: url('{{asset('assets/img/botonAsignarRoles.png')}}'); 
                background-size: contain; height: 40px; width: 143px;"/>
  </div>

  <div class="col-sm-3">
   <form id="formularioBuscadorCartas" action="/usuarios"  method="get">
      <div>  
        <input id="buscar" name="buscar" type="text"  placeholder="Buscar usuario" 
        aria-describedby="buscador" style="border: 1px;">
        
        <button type="submit" style=" background-color: white;">
          <img id="lupa" src="{{asset('assets/img/lupa.png')}}" height="25px" width="30px"/>
        </button>
      
      </div>
  </form> 
</div>
 
<!--
    <input type="submit" value="" onclick = "location='/usuarios/create'" class="form-control" style="background-image: url('{{asset('assets/img/botonCrearCuenta.png')}}'); 
                background-size: contain; height: 40px; width: 143px; margin-top: 30px;margin-left: 200px; margin-bottom: 10px;" />


    <input type="submit" value="" onclick = "location='/roles/asignacion'" class="form-control" style="background-image: url('{{asset('assets/img/botonAsignarRoles.png')}}'); 
                background-size: contain; height: 40px; width: 143px;margin-left: 200px;margin-bottom: 10px;"/>


-->
  </section>
</div>

 @if(Session::has('mensaje_creado')) 
   <div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>Aviso </strong>{{session('mensaje_creado')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
 @endif 
 
 
    <table border="1" class="table table-hover">
        <thead class="bg-warning">
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
              <a href="http://localhost:8000/usuarios/delete/ <?php echo $usuario->id; ?>">Eliminar</a>
              <a href="{{route('informacion.create',$usuario->id)}}">Informacion</a>  
            </td>
             
        </tr>
    @endforeach

    {{!! $usuarios->links() !!}}    

    </table>
    
@endsection

@endif
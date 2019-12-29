@extends("../layout/plantilla")
@section("cabecera")
  @include("../usuarios/menu")
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
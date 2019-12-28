@extends("../layout/plantilla")
@section("cabecera")
@include("../roles/menu")
@endsection
@section("contenido")
 <div class="container">
  <form>
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
      
      <div class="form-group" class="col-10" >
        <label for="{{$permiso->name}}" style="color: white;">Permiso que tiene el Rol</label>
        <input type="text" class="form-control" id="{{$permiso->name}}" readonly placeholder= "{{$permiso->name}}">
      </div>

  	   @endforeach
   </div>
  </form>  
</div>
  
@endsection





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
                      
                    </ul>
                  </div>
                </nav>
                <h2 style="color: white;">ESTA ES LA VISTA PARA AÑADIR INFORMACION</h2> 
@endsection
@section("contenido")
<form id="datos_formulario" action="/informacion/create" enctype="multipart/form-data" method="post">
    {{csrf_field()}}
  <div class="form-row">
      <div class="form-group col-md-4">
        <label for="especialidad" style="color:#FFFFFF">Especialidad</label>
        <input type="text" class="form-control" id="especialidad" placeholder="Especialidad" name ="especialidad">
      </div>
      <div class="form-group col-md-4">
        <label for="experiencia" style="color:#FFFFFF">Experiencia</label>
        <input type="textarea" class="form-control" id="experiencia" placeholder="Experiencia" name ="experiencia">
      </div>

      <div class="form-group col-md-6" >
        <label for="formacion" style="color:#FFFFFF">Formacion</label>
        <input type="text" class="form-control" id="formacion" placeholder="Formacion" name ="formacion">
      </div>
      <div class="form-group col-md-2">
        <label for="universidad" style="color:#FFFFFF">Universidad de Egreso</label>
        <input type="text" class="form-control" id="universidad" placeholder="Universidad" name="universidad">
      </div>
      <div class="text-center form-group col-md-3" id="nuevo">
       
        <label for="usuario" style="color:#FFFFFF">Perfil</label>
        <input type="number"  name ="user_id" hidden class="frorm-control" id="usuario"  value="{{$usuario->id}}" >                    
      </div>
    </div> 
    <div class="form-row">
      <div class="form-group col-md-2">
        <label for="años" style="color:#FFFFFF"> Años de Experiencia </label>
        <input type="number" class="form-control" id="años" placeholder="AñosdeExperiencia" name="anio_es">
      </div>
      <div class="form-group col-md-6">
        <label for="logros" style="color:#FFFFFF">Logros</label>
        <input type="text" class="form-control" id="logros" placeholder="Logros" name="logros">
      </div>
    </div>
    
    <div class="form-group">
      <label for="exampleFormControlFile1" style="color:#FFFFFF">Ingrese una Foto</label>
      <input type="file" id="file" class= "eligir_archivos" name="mi_imagen[]" multiple="true" onchange="return validarExt()">
    </div>
    <br>
    <button type="submit" class="btn btn-warning" style="color: #000000">Guardar</button>
    
  </form>
@endsection
@endif
<script>
    
    
    
    var id = 0;
    function validarExt()
    {
        var files =   e.target.files;
        var archivoInput = document.getElementById('file');
        var archivoRuta = archivoInput.value;
        id = id +1; 
    //for (var i = 0, f; f = files[i]; i++) {
    // alert(f.src);
        alert("dsa");
    var extPermitidas = /(gif|jpeg|jpg|png)$/i;
     alert("hola");
    if(!extPermitidas.exec(archivoRuta)){
        alert('solo se adminten tipos png ,jpg , jpg');
        archivoInput.value = '';
        return false;
    }

    else
    {
        if (archivoInput.files && archivoInput.files[0]) 
        {
            var visor = new FileReader();
            visor.onload = function(e) 
            {
                document.getElementById('nuevo').innerHTML = 
                '<img src="'+e.target.result+'"   class="imagen"  id="'+id+'"/>';
            };
            visor.readAsDataURL(archivoInput.files[0]);
        }
    } 
    
}

</script>
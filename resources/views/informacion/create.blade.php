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
                      
                    </ul>
                  </div>
                </nav>
               <br>
@endsection
@section("contenido")
<form id="datos_formulario" action="/informacion/create" enctype="multipart/form-data" method="post" >
  <table style="background-color: transparent;margin: auto 25%;">
    {{csrf_field()}}
    <div class="row">
    <div class= "col-8">  
      <tr>
      <td id="idCampo">Experiencia</td> 
      <td><input type="text" class="form-control" id="experiencia" placeholder="Experiencia" name ="experiencia"
      pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required/>
      </td>
      <tr> 
      
      <tr>
      <td id="idCampo" >Logros</td>
       <td><input type="text" class="form-control" id="logros" placeholder="Logros" name="logros"  pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required/>
       </td>
      </tr>
      
      <tr>
        <td id="idCampo" >Formacion</td>
        <td> <input type="text" class="form-control" id="formacion" placeholder="Formacion" name ="formacion"  pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required/>>
        </td>
      </tr>   
    </div>  
      
    <div class= "col-4">
      <tr>
        <td id="idCampo" >Especialidad</td>
        
        <td><select class="custom-select " id="especialidad" name ="especialidad">
         <option selected >Especialidad</option>
          <option value="1">Psicologo</option>
          <option value="2">Novelista</option>
          <option value="3">Esccritor</option> 
        </select>
      </td>
      </tr> 
        
        <tr>
        <td id="idCampo"> Universidad de Egreso</td>
        <td><input type="text" class="form-control" id="universidad" placeholder="Universidad" name="universidad"  pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,20}" required/>
        </td>
        </tr>
        
        <tr>
          <td id="idCampo"> Años de Experiencia</td>
          <td><input type="number" class="form-control" id="años" placeholder="AñosdeExperiencia" name="anio_es">
          </td>
        </tr>
            
        
        <tr>
          <td id="idCampo"> Ingres un Foto </td>
         <td> <input type="file" class="form-control" id="file" class= "eligir_archivos" name="mi_imagen[]" multiple="true" onchange="return validarExt()">
         </td>
        <tr>
         
        <tr>  
          <td >
          <button type="submit" class="btn btn-warning" style="color: #000000">Guardar</button>
          </td>
        </tr> 
          
        
        <input type="number" name="user_id" hidden  id="usuario"value="{{$usuario->id}}">
    </div>  
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
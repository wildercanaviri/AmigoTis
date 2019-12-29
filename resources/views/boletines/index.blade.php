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
              <a class="nav-link" href="/inicio" >Inicio</a>
          </li>
                        
          <li class="nav-item">
              <a class="nav-link" href="/correo">Cartas de niños</a>
          </li>
                        
          <li class="nav-item">
              <a class="nav-link" href="/usuarios">Usuarios</a>
          </li>
                        
          <li class="nav-item ">
              <a class="nav-link" href="/roles">Roles</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/permisos">Permisos</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/crearBoletin" style="text-decoration: underline;">Edición de Boletines</a>
          </li>
          
     
        </ul>
      </div>
</nav>
<style>

h2{
	text-align:center;
}

table{
	width:50%;
	margin:auto;
	background-color:#FF9;
	border:solid 5 px #FFffff;
	padding:5px;
	
}

td{
	padding:5px 0;
  color:white;
}

</style>

<body>
<h2 style="color:white;">Nuevo Boletín</h2>
<form action="Insertar Contenido.php" method="post" enctype="multipart/form-data" name="form1">
<table style="background-color: transparent;">
<tr>
  <td>Título: 
    <label for="campo_titulo"></label></td>
  <td><input type="text" name="campo_titulo" id="campo_titulo"></td>
  
  
  </tr>
  <tr><td>Contenido: 
    <label for="area_comentarios"></label></td>
    <td><textarea name="area_comentarios" id="area_comentarios" rows="10" cols="50"></textarea></td>
    </tr>
    <input type="hidden" name="MAX_TAM" value="2097152">
  <tr>
  <td colspan="2" align="center">Seleccione una imagen con tamaño inferior a 2 MB</td></tr>
  <tr>
    <td colspan="2" align="left"><input type="file" name="imagen" id="imagen"></td>
    </tr>
    <tr>
    <td colspan="2" align="center">  
    <input type="submit" name="btn_enviar" id="btn_enviar" value="Publicar Boletín"></td></tr>
  <tr><td colspan="2" align="center"><a href="Mostrar Blog.php">Página de visualización del blog</a></td></tr>
  
  </table>
</form>
<p>&nbsp;</p>

</body>
@endsection
@endif
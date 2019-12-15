<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AMIGO MENSAJERO</title>
        <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}">
      </head>
    <script type="text/javascript" src="{!! asset('assets/js/jquery-3.4.1.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/js/bootstrap.js') !!}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <body>
    @extends("layout.plantilla")
      @section("cabecera") 
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(255,192,0);">
                  
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
              @if (Auth::guest())
                  <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                      <li class="nav-item active">
                        <a class="nav-link" href="http://localhost:8000/inicio" style="text-decoration: underline;">Inicio<span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="http://localhost:8000/carta">Escribe tu Carta</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8000/boletin">Boletín</a>
                      </li>
                       <!-- Authentication Links -->
                    
                        
                    @else
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                      <li class="nav-item active">
                        <a class="nav-link" href="http://localhost:8000/inicio" style="text-decoration: underline;">Inicio<span class="sr-only">(current)</span></a>
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
                    @endif
                      
                    </ul>
                  </div>
                </nav>
                <h2 style="color: white;">ESTA ES LA VISTA DE INICIO</h2> 
      @endsection  

    </body>
</html>
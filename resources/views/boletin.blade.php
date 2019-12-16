<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AMIGO MENSAJERO</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Concert+One&display=swap" rel="stylesheet">
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/estilo-plantilla.css')}}">
        
            body{
                background-image: url('{{asset('assets/img/fondo.png')}}');
            }
        </style>
        <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}">
    </head>
    <body>
      @extends("layout.plantilla")
      @section("cabecera")
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(255,192,0);">
                  
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
              
                  <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8000/inicio">Inicio</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8000/carta" >Escribe tu Carta</a>
                      </li>
                      <li class="nav-item active">
                        <a class="nav-link" href="#" style="text-decoration: underline;">Boletín<span class="sr-only">(current)</span></a>
                      </li>
                      @if (Auth::guest())
                        
                    @else
                       <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8000/usuarios">Usuarios</a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="http://localhost:8000/roles">Roles</a>
                      </li>
                    @endif
                    </ul>
                  </div>
                </nav>  
        <h2 style="color: white;">ESTA ES LA VISTA DE BOLETINES</h2>
      @endsection  
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AMIGO MENSAJERO</title>

         <script type="text/javascript" src="{!! asset('assets/js/jquery-3.4.1.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/js/bootstrap.js') !!}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">


    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Concert+One&display=swap" rel="stylesheet">
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/estilo-plantilla.css')}}">
        
    <!-- pligin para validaciones-->
    <script type="text/javascript" src="../../../public/assets/js/libreriaValidacion.js"></script>
    <script src="../../../public/assets/js/validacionesMin.js"></script>
    <script src="../../../public/assets/js/jquery.validate.js"></script> 
    
            <style type="text/css">
            body{
                background-image: url('{{asset('assets/img/fondo.png')}}');
                background-size: cover;
                height: 800px;
            }    
        </style>

    </head>
      <header>
                <!-- Logotipo y titulo -->
                <img src="{{asset('assets/img/avion.png')}}" height="80px" width="150px"><a class="navbar-brand" href="#" style="font-family: 'Concert One', cursive; font-size: 45px; color: white;">EL AMIGO MENSAJERO</a>

                <button type="button" class="btn btn-success" data-toggle="modal" onclick="location.href='http://localhost:8000/logout'" style="margin-left:350px; border:0px; padding: 0px;"><img src="{{asset('assets/img/botonCerrarSesion.jpeg')}}" height="40px" width="200px"/></button>

                
                <!-- Menú de Navegación -->
                 
            </header>
			<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(255,192,0);">
                  
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                 <!-- Authentication Links -->
                    @if (Auth::guest())
                  <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8000/inicio">Inicio</a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="http://localhost:8000/carta">Escribe tu Carta</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8000/boletin">Boletín</a>
                      </li>
                    
                        
                    @else
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8000/inicio">Inicio</a>
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
               <h2 style="color: white;">No está autorizado para ésta sección</h2> 

    </body>
</html>
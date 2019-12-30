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
                        <a class="nav-link" href="/carta">Escribe tu Carta</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/boletin">Boletín</a>
                      </li>    
                    @else
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                      <li class="nav-item active">
                        <a class="nav-link" href="/inicio" style="text-decoration: underline;">Inicio<span class="sr-only">(current)</span></a>
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
                      <li class="nav-item ">
                        <a class="nav-link" href="/crearBoletin">Edición de Boletines</a>
                      </li>
                    @endif
                      
                    </ul>
                  </div>
                </nav>
                
      @endsection  
      @section("contenido")

      @if (Auth::guest())
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <center>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src ="{{asset('assets/img/carusel/fondo1.png')}}" class="d-block w-100" width="100" height="500">
          </div>
          <div class="carousel-item">
            <img src="{{asset('assets/img/carusel/fondo2.png')}}" class="d-block w-100" width="100" height="500" >
          </div>
          <div class="carousel-item">
            <img src="{{asset('assets/img/carusel/fondo3.png')}}" class="d-block w-100" width="100" height="500">
          </div>
        </div>
        </center>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      @else
      
      @endif
      @endsection
      @section("pie_pagina")


 <!--MOSTRAR CON MODAL LA CARTA SELECCIONADA-->
    @include("../modal_bienvenido")

<br>
 <p class="text-center" style="color: white;">---------------------------</p>

    <footer style="background-color: bold; color: white; margin-bottom: -50px;">
        <div >
        <div class="footer-copyright text-center">© 2019 Copyright:
            <a> El Amigo Mensajero</a>
            <p>Desarrollado por Sublime Projects S.R.L.</p>
        </div>
        </div>

    </footer>

     
      @endsection

 <script type="text/javascript">
$( document ).ready(function() {
    $('#myModal').modal('toggle')
});
</script>


    </body>
</html>
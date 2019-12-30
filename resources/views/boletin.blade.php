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
                        <a class="nav-link" href="/inicio">Inicio</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/carta" >Escribe tu Carta</a>
                      </li>
                      <li class="nav-item active">
                        <a class="nav-link" href="#" style="text-decoration: underline;">Boletín<span class="sr-only">(current)</span></a>
                      </li>
                      @if (Auth::guest())
                        
                    @else
                       <li class="nav-item">
                        <a class="nav-link" href="/usuarios">Usuarios</a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="/roles">Roles</a>
                      </li>
                    @endif
                    </ul>
                  </div>
                </nav>  
   
      @endsection  

      @section("contenido")

    <div class="col-md-4 ">
   
    </div>
   
      <div class="col-md-8" style="width: 80%; height: 500px;  justify-content: center;">
        
          <h2 style="color: yellow">EL MEJOR DIA QUE TUVE</h2>
          <p style="color: yellow">
            El 24 de febrero viaje con mis padres a un lugar nuevo
            e impresionante viendo de una manera distinta otros lugares........<a href="" style="color: red">ver mas</a>
          </p>
         <img src="{{asset('assets/img/avion.png')}}" height="80px" width="150px">

          <p><strong style="color: blue">Me gusta</strong> |<strong style="color: orange">43</strong> </p>
        

         <h2 style="color: yellow">MI FAMILIA</h2>
          <p style="color: yellow">
            El 24 de febrero viaje con mis padres a un lugar nuevo
            e impresionante viendo de una manera distinta otros lugares........<a href="" style="color: red">ver mas</a>
          </p>
         <img src="{{asset('assets/img/avion.png')}}" height="80px" width="150px">
          <p><strong style="color: blue">Me gusta</strong> |<strong style="color: orange">22</strong> </p>

        <h2 style="color: yellow">CON MIS AMIGUITOS</h2>
          <p style="color: yellow">
            El 24 de febrero viaje con mis padres a un lugar nuevo
            e impresionante viendo de una manera distinta otros lugares........<a href="" style="color: red">ver mas</a>
          </p>
         <img src="{{asset('assets/img/avion.png')}}" height="80px" width="150px">
          <p><strong style="color: blue">Me gusta</strong>|<strong style="color: orange">65</strong> </p>


      </div>
    
    <div class="col-md-4">
      <h1></h1>
    </div>
      
    @endsection
    </body>
</html>
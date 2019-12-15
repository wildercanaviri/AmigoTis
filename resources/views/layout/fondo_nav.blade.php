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
         <script type="text/javascript" src="{!! asset('assets/js/jquery-3.4.1.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('assets/js/util.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('assets/js/scrollspy.js') !!}"></script>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/docs.min.css')}}">

		<!-- pligin para validaciones-->
    <!--
		<script type="text/javascript" src="../../../public/assets/js/libreriaValidacion.js"></script>
		<script src="../../../public/assets/js/validacionesMin.js"></script>
		<script src="../../../public/assets/js/jquery.validate.js"></script> 
		
		!-->
        
        
        <script type="text/javascript" src="{!! asset('assets/js/bootstrap.js') !!}"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <style type="text/css">
            body{
                background-image: url('{{asset('assets/img/fondo.png')}}');
                background-size: cover;
                height: 800px;
            }
           
        </style>
		


    </head>
    <body>
    
            <header>
                <!-- Logotipo y titulo -->
                <img src="{{asset('assets/img/avion.png')}}" height="80px" width="150px"><a class="navbar-brand" href="#" style="font-family: 'Concert One', cursive; font-size: 45px; color: white;">EL AMIGO MENSAJERO</a>
                @if (Auth::guest())
                        <button type="button" class="btn btn-success" data-toggle="modal" onclick="location.href='http://localhost:8000/login'" style="margin-left:350px; border:0px; padding: 0px;"><img src="{{asset('assets/img/botonIniciarSesion.png')}}" height="40px" width="200px"/></button>
                    @else 
                    <!--
                       <button type="button" class="btn btn-success" data-toggle="modal" onclick="location.href='http://localhost:8000/logout'" style="margin-left:350px; border:0px; padding: 0px;"><img src="{{asset('assets/img/botonCerrarSesion.jpeg')}}" height="40px" width="200px"/></button>

                       !-->
                       
                         <div class="btn-group" style="margin-left:350px;">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" style="background-color: #C0FFA4; font-weight: bold; color: black; border-radius: 0px;">


                          {{Auth::user()->nom_usu}} {{auth()->user()->ape_usu}}
                        </button>
                        <div class="dropdown-menu" style="background-color: #C0FFA4;border-radius: 0px; ">
                          <a class="dropdown-item" href="/configuracion" style="font-size: 15px;color: black;">Configuración de mi Cuenta</a>
                          <a class="dropdown-item" href="/informacionPersonal" style="font-size: 15px;color: black;border-style: solid;">Información Personal</a>
                          <a class="dropdown-item" href="/notificaciones" style="font-size: 15px;color: black;border-style: solid;">Notificaciones

                           @php

                            $conta=0;
                            foreach($notificaciones as $notificacion){
                               
                               $k=$notificacion->leido;
                               $color=$notificacion->color;
                               
                               if(($k=="0")&&($color=="Rojo"))
                               {
                                    $conta++;
                               }

                            }

                           if($conta==0)
                           {
                              
                             
                           }else
                           {
                              echo("<h5 style='display: inline;'> $conta</h5>");  
                           }

                       @endphp 

                          </a>
                          <div class="dropdown-divider" style="border-style: solid;"></div>
                          <a class="dropdown-item" href="http://localhost:8000/logout" style="font-size: 15px;color: black;">Cerrar Sesión</a>
                        </div>
                    </div>
                    
                    <a style="background-color: white;" href="/notificaciones">


                      <button type="button" class="btn btn-success" data-toggle="modal" onclick="location.href='http://localhost:8000/login'" style= "border:0px; padding: 0px; margin-right: -20px;"><img src="{{asset('assets/img/notificacion.jpg')}}" height="35px" width="45px"/></button>


                      @php

                            $conta=0;
                            foreach($notificaciones as $notificacion){
                               
                               $k=$notificacion->leido;
                               $color=$notificacion->color;
                               
                               if(($k=="0")&&($color=="Rojo"))
                               {
                                    $conta++;
                               }

                            }

                           if($conta==0)
                           {
                              
                             
                           }else
                           {
                              echo("<h5 style='color:bold; display: inline; color: red;'> $conta</h5>");
                              

                           }

                       @endphp 




                     </a>
                  @endif
      
                
                <!-- Menú de Navegación -->
                 
            </header>
      

    </body>
</html>

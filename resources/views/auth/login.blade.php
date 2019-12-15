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
                        <a class="nav-link" href="http://localhost:8000/inicio">Inicio</a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="http://localhost:8000/carta">Escribe tu Carta</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8000/boletin">Boletín</a>
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
 

     
	
	      <div class="panel panel-heading" style="text-align: center;">
		 
		    <img src="{{asset('assets/img/circuloUsuario.png')}}" style="width: 40%; margin-top: 20px;">
		 </div>
		 <center>
		 	<div class="panel-body">
		  
		      <form method="post" action ="{{ route('loginValidar')}}" style="background-color: transparent;" id="campos">
			       {{ csrf_field()}}
 

			       <div class="form-group {{ $errors->has('usuario')? 'has-error':''}}" style="margin-top: 5px;">
				  
				     <label for="usuario"></label>
				      <img src="{{asset('assets/img/usr.jpg')}}" width="30px" height="30px" style="position: absolute; margin-top: 28px; margin-left: -175px;">
				     <input class="form-control" type="text" name="correo_name"
							placeholder="Nombre de Usuario o Correo electrónico" style="-webkit-border-radius: 50px;-moz-border-radius: 50px;border-radius: 50px; text-align: center; text-rendering: auto;">
					   {!! $errors->first('correo_name','<span class="help-block" style="color:#ffffff">Nombre de Usuario o Correo es requerido</span>')!!}
							
				  </div>
				   <div class="form-group {{ $errors->has('contrasenia')? 'has-error':''}}">
				  
				     <label for="contrasenia"></label>
				     <img src="{{asset('assets/img/candado.jpg')}}" width="30px" height="30px" style="position: absolute; margin-top: 28px; margin-left: -175px;">
				     <input class="form-control" type="password" name="contrasenia"
							placeholder="Contraseña" style="-webkit-border-radius: 50px;-moz-border-radius: 50px;border-radius: 50px; text-align: center;">

							{!! $errors->first('contrasenia','<span class="help-block" style="color:#ffffff; text-align: center;">Contraseña es requerida</span>')!!}
				  </div>
				  <div class="modal-footer" style="border-top: 0px;">
				  	
			      <button class="btn btn-primary btn-block" style="background-color: rgb(255,192,0);color: black; -webkit-border-radius: 50px;-moz-border-radius: 50px;border-radius: 50px; margin: 0px auto; font-weight: bold;  font-size: 22px; width: 40%">Ingresar</button>
				  </div>
			 
			 </form>



			
		 
		 </div>
		 </center>
		 
	   
	
	


@endsection
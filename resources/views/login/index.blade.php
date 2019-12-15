@extends("../layout/plantilla")
@section("cabecera")
@endsection
@section("contenido")
 <div class="row">

     <div class="col-md-4 col-md-offset-4">
	
	      <div class="panel panel-heading">
		 
		    <h1 class="panel-title">Acceso a la aplicacion</h1>
		 </div>
		 <div class="panel-body">
		  
		      <form method="post" action ="/login">

			       {{ csrf_field()}}
			       <div class="form-group {{ $errors->has('usuario')? 'has-error':''}}">
				  
				     <label for="usuario">Usuario</label>
				     <input class="form-control"
							type="text"
							name="correo_name"
							placeholder="Ingresa su usuario">
					   {!! $errors->first('usuario','<span class="help-block">:message</span>')!!}
							
				  
				  </div>
				   <div class="form-group {{ $errors->has('contrasenia')? 'has-error':''}}">
				  
				     <label for="contrasenia">Contraseña</label>
				     <input class="form-control"
							type="password"
							name="contrasenia"
							placeholder="Ingresa su contraseña">
							{!! $errors->first('contrasenia','<span class="help-block">:message</span>')!!}
				  
				  </div>
			 
			      <button class="btn btn-primary btn-block">Acceder</button>
			    
			 
			 </form>
		 
		 </div>
	   
	
	</div>


</div>
@endsection
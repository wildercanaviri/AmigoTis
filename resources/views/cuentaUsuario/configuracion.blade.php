@if (Auth::guest())
  <script>window.location = "/login";</script>
@else
@extends("../layout/plantilla")
<style type="text/css">
  .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
  margin-top: 20px;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
@section("cabecera")
  @include("../cuentaUsuario/menu")
@endsection
@section("contenido")
	
<h2 style="color: white;">Configuración de mi Cuenta</h2>
  <div class="" style="color: white; font-weight: bold;">
      <div style="width: 50%;">

            <form action="/configuracion/usuario" method="post">
            {{csrf_field()}}
            <table  style="font-size: 16px;font-weight: bold; background: transparent; width: 90%;margin: 20px auto;"> 
            <input type="text" name="id" value="{{Auth::user()->id}}" hidden>   
                <tr>  
                  <td id="idCampo">Permitir Notificaciones &nbsp &nbsp &nbsp</td>
                    <td>
                    <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round"></span>
                    </label>
                  </td> 
                </tr>
                <tr>
                  <td id= "idCampo">Nombre de Usuario </td> 
                    <td>
                    <input type="text" name="username" class="form-control" value="{{Auth::user()->username}}">
                    </td>
                  </div>
                  </tr>
                  <tr>
                    <td id= "idCampo">Contraseña </td> 
                        <td>
                        <input type="password" name="password" class="form-control" value="{{Auth::user()->password}}">
                        </td>  
                    </div>
                  </tr>
                  <tr>
                    <td>
                    <input type="submit" class="form-control" value=""style="background-image:  url('{{asset('assets/img/botonEditar.png')}}'); 
                      background-size: contain; height: 40px; width: 143px;margin-left: 200px;margin-bottom: 10px; margin-top: 30px;" />
                    <td>
                  </tr>
              <table>  
            </form>
            <div>      
                <form method="post" action="/configuracion/eliminar">
                        {{csrf_field()}}

                        <input type="text" name="id" value="{{Auth::user()->id}}" hidden> 
                         
                        <input type="submit" class="form-control" value="" style="background-image: url('{{asset('assets/img/botonEliminarMiCuenta.png')}}'); 
                           background-size: contain; height: 40px; width: 220px;margin-left: 200px;margin-bottom: 10px; margin-top: 30px;" />
                         
                </form>
            </div>
    </div>
                           

</div>

@endsection
@endif
@if (Auth::guest())
  <script>window.location = "/login";</script>
@else
@extends("../layout/plantilla")

@section("cabecera")
    @include("../cuentaUsuario/menu")
@endsection

@section("contenido")
	<h2 style="color: white;">Información Personal</h2>
<script>

$(function(){
    $("#fecha_nac").datepicker({
       dateFormat: 'dd/mm/yy', 
       changeMonth: true,
       changeYear: true,
        yearRange: '-100:+0'
    });


});  
</script>
<form action="/informacionPersonal/editar" method="post"> 
        {{csrf_field()}}   
    <div class="" style="color: white; font-weight: bold;">
          <div style="width: 50%;">
              
              <input type="text" name="id" value="{{Auth::user()->id}}" hidden>
               
               <div style="margin-top: 20px; text-align: center;">
                  <label style="margin-right: 37px;">Nombre</label>
                  <input type="text" name="nom_usu" value="{{Auth::user()->nom_usu}}">
               </div>

               <div style="margin-top: 20px; text-align: center;">
                  <label style="margin-right: 37px;">Apellido</label>
                  <input type="text" name="ape_usu" value="{{auth()->user()->ape_usu}}">
               </div>
               
               <div style="margin-top: 20px; text-align: center;">
                  <label style="margin-right: 47px;">Correo</label>
                  <input type="text" name="email" value="{{auth()->user()->email}}">
               </div>
               
               <div style="margin-top: 20px; text-align: center;">
                  <label>Fecha de Nac.</label>
                  <input type="text"  id="fecha_nac" name="fecha_nac" value="{{Auth::user()->fecha_nac}}">
               </div>
               
               <div style="margin-top: 20px; text-align: center;">
                  <label style="margin-right: 35px;">Telefono</label>
                  <input type="text" name="tel_usu" value="{{Auth::user()->tel_usu}}">
               </div>
          </div>
           
            <div>
              <input type="submit" value="" 
              style="background-image: url('{{asset('assets/img/botonEditar.png')}}'); 
                background-size: contain; height: 40px; width: 143px;margin-left: 200px;margin-bottom: 10px; margin-top: 30px;" />
            </div>
          
     </div>
</form>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


@endsection
@endif
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
       dateFormat: 'yy-dd-mm', 
        dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
      
        dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
      
        monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
        monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dec" ],
       changeMonth: true,
       changeYear: true,
        yearRange: '-100:+0'
    });


});  
</script>
<form action="/informacionPersonal/editar" method="post"> 
        {{csrf_field()}}   
   <table style="background-color: transparent;">    
              <input type="text" name="id" value="{{Auth::user()->id}}" hidden>
            <tr >               
               <td id="idCampo">Nombre: </td>
               <td><input class="form-control" type="text" name="nom_usu" value="{{Auth::user()->nom_usu}}">
               </td>
            </tr>
            <tr>
               <td id="idCampo">Apellido</td>
               <td><input class="form-control" type="text" name="ape_usu" value="{{auth()->user()->ape_usu}}">
               </td>
            </tr>
            <tr>
               <td id="idCampo">Email</td>
               <td><input  class="form-control"type="text" name="email" value="{{auth()->user()->email}}">
               </td>
            </tr>
            <tr>  
               <td id="idCampo">Fecha de Naciemiento</td>
               <td><input class="form-control" type="text"  id="fecha_nac" name="fecha_nac" value="{{Auth::user()->fecha_nac}}">
               <td>
            </tr> 
               
            <tr>  
               <td id="idCampo">Telefono</td>
                <td>  <input class="form-control" type="text" name="tel_usu" value="{{Auth::user()->tel_usu}}">
                </td> 
               </div>
            </tr>
           
             <tr>
               <td>
               <input type="submit" value=""  class="form-control"
              style="background-image: url('{{asset('assets/img/botonEditar.png')}}'); 
                background-size: contain; height: 40px; width: 143px;margin-left: 200px;margin-bottom: 10px; margin-top: 30px;" />
               <td>
            <tr>
          
         </table>
</form>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


@endsection
@endif
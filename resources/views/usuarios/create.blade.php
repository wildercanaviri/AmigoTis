@if (Auth::guest())
  <script>window.location = "/login";</script>
@else
@extends("../layout/plantilla")
@section("cabecera")
    @include("../usuarios/menu")
      <h2 style="color: white;">ESTA ES LA VISTA DE AMINISTRADOR-PESTAÑA USUARIOS/crearusuario</h2> 
@endsection

@section("contenido")

<script>

 $(document).ready(function(){ 
   $("#datos_formulario").validate();

 });
 

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

 @if(Session::has('error_email')) 
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Aviso </strong>{{session('error_email')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
 @endif 
 @if(Session::has('error_user')) 
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Aviso </strong>{{session('error_user')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
 @endif 



<form id="datos_formulario" action="/usuarios" method="post" style="background: transparent; width: 90%;" onsubmit="return validar();">
  <table   style="font-size: 16px;font-weight: bold; background: transparent; width: 90%;margin: 20px auto;">

    <tr>
      <td id="idCampo">Nombre: </td>
      <td>
<<<<<<< HEAD
        <input type="text"class="form-control"  name="nom_usu" placeholder="Nombre" id="nom_usu" 
              pattern="[a-zA-ZáéíóúñÁÉÍÓÚÑ]{3,15}"
               title="Solo se admiten caracteres alfabéticos. Rango válido 3-15" required>
=======
        <input type="text" name="nom_usu" placeholder="Nombre" id="nom_usu" 
              pattern="[a-zA-ZáéíóúñÁÉÍÓÚÑ]{3,15}" 
               title="Solo se admiten caracteres alfabéticos. Rango válido 3-15" value ="<?php echo $datos['nom_usu']; ?>" required>
>>>>>>> 3302b17bc7686513613bf7c8118df6163ba06c73
        
          {{csrf_field()}}
      </td>

      <td id="idCampo">Usuario: </td>
      <td>
<<<<<<< HEAD
        <input class="form-control" type="text" name="usuario" placeholder="Nombre usuario" pattern="[a-zA-Z0-9áéíóú ,.'-]{2,64}" required>
=======
        <input type="text" name="usuario" placeholder="Nombre usuario" pattern="[a-zA-Z0-9áéíóú ,.'-]{2,64}" value ="<?php echo $datos['usuario']; ?>" required>
>>>>>>> 3302b17bc7686513613bf7c8118df6163ba06c73
      </td>

    </tr>
    <tr>
      <td id="idCampo">Apellido: </td>
      <td>
<<<<<<< HEAD
        <input type="text" class="form-control"  name="ape_usu" placeholder="Apellido"
         pattern="[a-zA-Záéíóú ,.'-]{2,64}" title="Solo se admiten caracteres alfabéticos." required>
=======
        <input type="text" name="ape_usu" placeholder="Apellido"
         pattern="[a-zA-Záéíóú ,.'-]{2,64}" title="Solo se admiten caracteres alfabéticos." value ="<?php echo $datos['ape_usu']; ?>" required>
>>>>>>> 3302b17bc7686513613bf7c8118df6163ba06c73
      </td>

      <td id="idCampo">Contraseña: </td>
      <td>
        <input class="form-control" type="password" name="contrasenia" id="contrasenia" placeholder="Contraseña"
              pattern="[A-Za-z0-9!?-]{5,20}" required title="La contraseña debe tener al entre 5 y 8 
              NO puede tener otros símbolos.">
      </td>


    </tr>

    <tr>
      <td id="idCampo">Correo: </td>
      <td>
<<<<<<< HEAD
        <input type="email" class="form-control" name="correo" placeholder="Correo" pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" required>
=======
        <input type="email" name="correo" placeholder="Correo" pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" value ="<?php echo $datos['correo']; ?>" required>
>>>>>>> 3302b17bc7686513613bf7c8118df6163ba06c73
      </td>

      <td id="idCampo">Confirmar Contraseña: </td>
      <td>
        <input type="password"  class="form-control" name="confirmcontrasenia" id="confirmcontrasenia" placeholder="Confirmar Contraseña"
                        pattern="[A-Za-z0-9!?-]{5,8}" title="La contraseña debe tener al entre 5 y 8 
              NO puede tener otros símbolos." required>
      </td>

    </tr>
    <tr>
      <td id="idCampo">Fecha nacimiento: </td>
      <td>
<<<<<<< HEAD
          <input type="text" class="form-control" name="fecha_nac" id="fecha_nac">
=======

        <input type="text" class="form-control" name="fecha_nac" id="fecha_nac" value ="<?php echo $datos['fecha_nac']; ?>">
     
>>>>>>> 3302b17bc7686513613bf7c8118df6163ba06c73
      </td>

      <td id="idCampo"><span id="error1" style="margin-left: 50px;"></span></td>

    </tr>

    <tr>
      <td id="idCampo">Telefono: </td>
      <td>
<<<<<<< HEAD
        <input class="form-control"  type="tel" pattern="[0-9]{6,9}" name="tel_usu" title="Solo caracteres numéricos " title="Solo caracteres numéricos ">
=======
        <input type="tel" pattern="[0-9]{6,9}" name="tel_usu" title="Solo caracteres numéricos " title="Solo caracteres numéricos " value ="<?php echo $datos['tel_usu']; ?>">
>>>>>>> 3302b17bc7686513613bf7c8118df6163ba06c73
      </td>
<!--
      <td id="idCampo">Rol</td>
      <td>
        <select name="nom_rol">
          @foreach($roles as $role)
            <option value="{{$role->nom_rol}}">{{$role->nom_rol}}</option>
          @endforeach
        </select>
      </td>
    !-->

    </tr>

      <th>
        
        <td colspan="2" align="center">
          <input type="submit" name="enviar" id="enviar" value="" class="form-control"   style="background-image: url('{{asset('assets/img/botonRegistrarCuenta.png')}}'); 
                      background-size: contain; height: 40px; width: 209px;margin-top: 50px; margin-left: 30px;">
        </td>
      </th>
  </table>
  
</div>
 
</form>

<script type="text/javascript">
      

     var contra=document.getElementById("contrasenia").value;
     var confcontra=document.getElementById("confirmcontrasenia").value;

     if (contra!=confcontra) {


        return document.getElementById("enviar").onsubmit=false;

     }else{


      return document.getElementById("enviar").onsubmit=true;;
     }

  }


  $(document).ready(function(){

    $('#confirmcontrasenia').keyup(function(){

     var pas1=$('#contrasenia').val();
     var pas2=$('#confirmcontrasenia').val();

     if (pas1==pas2) {

            $('#error1').text("coinciden!").css("color","#A2ED96");

     }else{

          $('#error1').text("No coinciden!").css("color","rgb(255,192,0)");

     }

     if (pas2=="") {
        
            $('#error1').text("no puede estar en blanco").css("color","rgb(255,192,0)");
     }
     
  });

});
    
  
</script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
@endif
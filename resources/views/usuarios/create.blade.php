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
  
</script>

<form id="datos_formulario" action="/usuarios" method="post" style="background: transparent; width: 90%;" onsubmit="return validar();">
  <table style="font-size: 16px;font-weight: bold; background: transparent; width: 90%;margin: 20px auto;">

    <tr>
      <td id="idCampo">Nombre: </td>
      <td>
        <input type="text" name="nom_usu" placeholder="Nombre" id="nom_usu"  required pattern="[a-zA-ZáéíóúñÁÉÍÓÚÑ]{3,15}"
               title="Solo se admiten caracteres alfabéticos. Rango válido 3-15" >
        
          {{csrf_field()}}
      </td>

      <td id="idCampo">Usuario: </td>
      <td>
        <input type="text" name="usuario">
      </td>

    </tr>
    <tr>
      <td id="idCampo">Apellido: </td>
      <td>
        <input type="text" name="ape_usu" pattern="[a-zA-ZáéíóúñÁÉÍÓÚÑ]{3,15}" title="Solo se admiten caracteres alfabéticos. Rango válido 3-15" >
      </td>

      <td id="idCampo">Contraseña: </td>
      <td>
        <input type="password" name="contrasenia" id="contrasenia" placeholder="Contraseña"
                          pattern="(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$" required title="La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.
      NO puede tener otros símbolos.">
      </td>


    </tr>

    <tr>
      <td id="idCampo">Correo: </td>
      <td>
        <input type="email" name="correo"  pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" required>
      </td>

      <td id="idCampo">Confirmar Contraseña: </td>
      <td>
        <input type="password" name="confirmcontrasenia" id="confirmcontrasenia" placeholder="Confirmar Contraseña"
                        pattern="(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$" title=" al menos una minúscula y al menos una mayúscula.
      NO puede tener otros símbolos." required  >
      </td>



    </tr>


    <tr>
      <td id="idCampo">Fecha nacimiento: </td>
      <td>
        <input type="date" name="fecha_nac" min="1550-02-20" max="2015-04-24">
      </td>

      <td id="idCampo"><span id="error1" style="margin-left: 50px;"></span></td>

    </tr>

    <tr>
      <td id="idCampo">Telefono: </td>
      <td>
        <input type="tel" name="tel_usu" title="Solo caracteres numéricos " title="Solo caracteres numéricos ">
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
          <input type="submit" name="enviar" id="enviar" value=""  style="background-image: url('{{asset('assets/img/botonRegistrarCuenta.png')}}'); 
                      background-size: contain; height: 40px; width: 209px;margin-top: 50px; margin-left: 30px;">
        </td>
      </th>
  </table>
</form>









  
<script type="text/javascript">
      
  

  function validar()
  {

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


@endsection
@endif
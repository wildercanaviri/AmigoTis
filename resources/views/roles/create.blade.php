@if (Auth::guest())
  <script>window.location = "/login";</script>
@else
@extends("../layout/plantilla")
@section("cabecera")
@include("../roles/menu")
      <h2 style="color: white;">ESTA ES LA VISTA DE AMINISTRADOR-PESTAÑA ROLES/crea roles</h2> 
@endsection
@section("contenido")

<form action="/roles" method="post" style="background: transparent; width: 90%;">
  <table style="font-size: 16px;font-weight: bold; background: transparent; width: 90%;margin: 20px auto;">

    <tr>
      <td id="idCampo">Nombre de rol: </td>
      <td>
        <input type="text" name="nom_rol" required>
          {{csrf_field()}}
      </td>
    </tr>

    <tr>
      <td id="idCampo">Descripcion del rol: </td>
      <td>
        <input type="text" name="descripcion" required>
      </td>
    </tr>

    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="enviar" value="" style="background-image: url('{{asset('assets/img/botonGuardarRol.png')}}'); background-size: contain; height: 40px; width: 189px;margin-top: 50px; margin-left: 30px;">
      </td>
    </tr>
  </table>
</form>
@endsection
@endif
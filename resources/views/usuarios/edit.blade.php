@extends("../layout/plantilla")
@section("cabecera")
  @include("../usuarios/menu")
  <h2 style="color: white;">ESTA ES LA VISTA DE AMINISTRADOR-PESTAÑA USUARIOS/editarusuario</h2> 
@endsection
@section("contenido")

<form action="/usuarios/{{$usuario->id}}" method="post">
<table style="background-color: transparent;margin: auto 25%;">

<tr>
<td id="idCampo">Nombre: </td>
<td><input type="text" name="nom_usu" value="{{$usuario->nom_usu}}">
    {{csrf_field()}}
</td>
</tr>
<input type="hidden" name="_method" value="PUT">
<tr>
<td id="idCampo">Apellido: </td>
<td><input type="text" name="ape_usu" value="{{$usuario->ape_usu}}">
</td>
</tr>

<tr>
<td id="idCampo">Correo: </td>
<td><input type="text" name="correo" value="{{$usuario->email}}">
</td>
</tr>

<tr>
<td id="idCampo">Fecha nacimiento:: </td>
<td><input type="text" name="fecha_nac" value="{{$usuario->fecha_nac}}">
</td>
</tr>

<tr>
<td id="idCampo">Telefono: </td>
<td><input type="text" name="tel_usu" value="{{$usuario->tel_usu}}">
</td>
</tr>

<tr><td colspan="2" align="center">
<input type="submit" name="enviar" id="enviar" value=""  style="background-image: url('{{asset('assets/img/botonEditarCuenta.png')}}'); 
                  background-size: contain; height: 40px; width: 189px;margin-top: 50px;">
</td></tr>
</table>
</form>

@endsection
@extends("../layout/plantilla")
@section("cabecera")
  @include("../usuarios/menu")
  <br>
@endsection
@section("contenido")

<form action="/usuarios/{{$usuario->id}}" method="post">
  <div class="row " style="text-align: center;" >
    <div class= "col">
  <table style="background-color: transparent;margin: auto 25%;">

<tr>
<td id="idCampo">Nombre: </td>
<td><input type="text" name="nom_usu" class="form-control" value="{{$usuario->nom_usu}}">
    {{csrf_field()}}
</td>
</tr>
<input type="hidden" name="_method"  value="PUT">
<tr>
<td id="idCampo">Apellido: </td>
<td><input type="text" name="ape_usu" class="form-control" value="{{$usuario->ape_usu}}">
</td>
</tr>

<tr>
<td id="idCampo">Correo: </td>
<td><input type="text" name="correo" class="form-control" value="{{$usuario->email}}">
</td>
</tr>

<tr>
<td id="idCampo">Fecha nacimiento:: </td>
<td><input type="text" name="fecha_nac" class="form-control" value="{{$usuario->fecha_nac}}">
</td>
</tr>

<tr>
<td id="idCampo">Telefono: </td>
<td><input type="text" name="tel_usu" class="form-control" value="{{$usuario->tel_usu}}">
</td>
</tr>

<tr><td colspan="2" align="center">
<input type="submit" name="enviar" id="enviar" class="form-control" value=""  style="background-image: url('{{asset('assets/img/botonEditarCuenta.png')}}'); 
                  background-size: contain; height: 40px; width: 189px;margin-top: 50px;">
</td></tr>
</table>
</div>
 <div class= "col"> 
  @foreach($roles as $rol)
        
        <label id="idCampo" for="roles" >
            <input type="checkbox" class="form-check-input" id="rol" name="roles[]" style="position: relative !important; visibility: visible !important; margin-left: 20px; width: 20px; height: 20px;" value="{{$rol->id}}"
            {{in_array($rol->name,$rols)?"checked":""}}>{{$rol->name}}
       </label>
        <br>
   @endforeach
</div>
</div>
</form>
@endsection
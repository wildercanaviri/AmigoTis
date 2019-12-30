@if (Auth::guest())
  <script>window.location = "/login";</script>
@else
<style type="text/css">
  .contenido{
    width: 600px;
  }
</style>
@extends("../layout/plantilla")
@section("cabecera")
    @include("../correo/menu")
    <h2 style="color: white;">ESTA ES LA VISTA DE GENERAR CONTENIDO-NUEVA INFORMACIÓN </h2> 
@endsection


@section("contenido")

<form action="/infoNueva" method="post">

  {{csrf_field()}}
<div class="bd-example"   style="background-color:#COFFA4; width: 600px; color: white;">
  <div class="row">
    <div class="col-4">
      @if($cartas != [])
      <div id="list-example"  class="list-group z-depth-1">
        @foreach($cartas as $carta)
          @foreach($carta as $detalles)
        <a class="list-group-item list-group-item-action flex-column align-items-start " href="#{{$detalles->cod_car}}"><font style="vertical-align: inherit;">
          <font style="vertical-align: inherit;">Carta {{$detalles->cod_car}} </font></font></a>
        
          @endforeach
        @endforeach
      </div>
    </div>
    <div class="col-8">
      <div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
        @foreach($cartas as $carta)
          @foreach($carta as $detalles)

          <input type="text" name="codigos[]" value="{{$detalles->cod_car}}" hidden>
        <h4 id="{{$detalles->cod_car}}">
          <font style="vertical-align: inherit; color: red;">
              <font style="vertical-align: inherit;">Carta {{$detalles->cod_car}}</font>
          </font></h4>

          <h5 id="{{$detalles->cod_car}}">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">Autor de la carta:  {{$detalles->autor}}</font>
            </font></h5>

          <p id="{{$detalles->cod_car}}">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">{{$detalles->contenido}}</font>
            </font></p>

        @endforeach
      @endforeach

      </div>
      @else <h1>No Escogio ninguna car previamente </h1>
      @endif
    </div>
  </div>
</div>

<input type="submit" value="" class="form-control" style="background-image: url('{{asset('assets/img/botonGuardarContenido.png')}}'); background-size: contain; height: 45px; width: 239px;margin-left: 50px;margin-bottom: 0px; margin-top: 20px;">

<div class="form-group shadow-textarea" >
 
<textarea  class = "formato  z-depth-1" name="cont_nuevo" > 
</textarea>
</div>
</form>

@endsection

@endif
<style>
  .formato{
  text-decoration:none;
  color:#000;
  background:#ffffc6;
  display:block;
  top: -340px; 
  width: 470px;
  height: 300px;
  resize: none;
  position: relative;
  left: 750px;
  
  

}
</style>
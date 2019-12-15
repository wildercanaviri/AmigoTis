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
<div class="bd-example" style="background-color: transparent; width: 600px; color: white;">
  <div class="row">
    <div class="col-4">
      <div id="list-example" class="list-group">
        @foreach($cartas as $carta)
          @foreach($carta as $detalles)
        <a class="list-group-item list-group-item-action" href="#{{$detalles->cod_car}}"><font style="vertical-align: inherit;">
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
    </div>
  </div>
</div>

<input type="submit" value=""  style="background-image: url('{{asset('assets/img/botonGuardarContenido.png')}}'); background-size: contain; height: 45px; width: 239px;margin-left: 750px;margin-bottom: 0px; margin-top: 20px;">

<textarea name="cont_nuevo" style="position: relative;left: 750px;
top: -310px; width: 300px;height: 200px; resize: none;"> 
</textarea>

</form>

@endsection

@endif
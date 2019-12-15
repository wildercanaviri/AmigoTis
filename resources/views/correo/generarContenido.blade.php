@extends("../layout/plantilla")
@section("cabecera")
    @include("../correo/menu")
    <h2 style="color: white;">ESTA ES LA VISTA DE CREAR BOLETIN </h2> 
@endsection


@section("contenido")

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


        <h4 id="{{$detalles->cod_car}}"><font style="vertical-align: inherit; color: red;"><font style="vertical-align: inherit;">Carta {{$detalles->cod_car}}
        </font></font></h4>

          <h5 id="{{$detalles->cod_car}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Autor de la carta:  {{$detalles->autor}}
        </font></font></h5>


        <p><font style="vertical-align: inherit;">
          
          <font style="vertical-align: inherit;">{{$detalles->contenido}} 
          </font>

        
        </font></p>
        @endforeach
      @endforeach


      </div>
                <br>
               <div class="form-group row">
                          <label for="fecha" class="col-sm-2 col-form-label"><b>Titulo</b></label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="fecha">
                          </div>
              </div>
              
              <div class="form-group">
                <label for="contenido"><b>Contenido</b></label>
                <textarea  readonly class="form-control" id="contenido" rows="5" style="resize: none;"></textarea>
              </div>


<input type="submit" name="enviar" value="Generar Información" 
      class="btn btn-warning" style="margin-left: 50%; width:11em;">

    </div>
  </div>
</div>




@endsection


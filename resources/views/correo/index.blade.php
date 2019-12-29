@if (Auth::guest())
  <script>window.location = "/login";</script>
@else
@extends("../layout/plantilla")
@section("cabecera")
    @include("../correo/menu")
    <h2 style="color: white;">ESTA ES LA VISTA DE AMINISTRADOR-PESTAÑA CORREO</h2> 
  
@endsection
@section("contenido")

    <form id="formularioBuscadorCartas" action="/correo"  method="get">
      <div style="margin-left: 55px; background-color: white; width: 220px;">  
        <input id="buscar" name="buscar"  type="text" placeholder="Buscar carta" aria-describedby="buscador" style="border: 0px;">
        <button type="submit" style=" background-color: white;">
          <img id="lupa" src="{{asset('assets/img/lupa.png')}}" height="25px" width="30px"/>
        </button>
      </div>
  </form> 
  
  


<form action="correo/generarNuevaInformacion" method="POST">
  {{csrf_field()}}
<div id="contenedor">
    <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
    <label for="tab-1" class="tab-label-1"><b>PRINCIPAL</b></label>
   
    <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
    <label for="tab-2" class="tab-label-2" style="color:#cc0000"><b>PELIGROSAS</b></label>
   
    <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
    <label for="tab-3" class="tab-label-3"style="color:#ffd600"><b>NORMALES</b></label>
   
    <input id="tab-4" type="radio" name="radio-set" class="tab-selector-4" />
    <label for="tab-4" class="tab-label-4" style="color:green"><b>CORRECTAS</b></label>
                           
<div class="content">
    <!--CONTENIDO PRINCIPAL-->
    <div class="content-1">
      @if(count($cartas_buscador) == 0)
          @foreach($cartas_todas as $carta)
          <!---cartas niños-->
              @include("../correo/cartas_colores")
            <!--fin cartas de niños-->
          @endforeach
          
      @else
          @foreach($cartas_buscador as $carta)
              <!---cartas niños-->
              @include("../correo/cartas_colores")
            <!--fin cartas de niños-->
            
          @endforeach
      @endif    
    </div>
    <!-- FIN CONTENIDO PRINCIPAL-->
    
    <!--CONTENIDO CARTAS ROJAS-->
    <div class="content-2">
      
      @foreach($cartas_rojas as $carta)
        @if($carta->estado == "visto" || $carta->estado == "nuevo")
          <aside class="cartaCompleta">
              <img src="{{asset('assets/img/rojo.png')}}" height="5px" width="280px">
              <a href="#" onClick="Mostrar( 
              '{{$carta->cod_car}}',  
              '{{$carta->autor}}','{{$carta->hora}}','{{$carta->fecha}}','{{$carta->contenido}}' );"
            data-toggle="modal" data-target="#exampleModal">[ver carta]</a>
              <aside id="contenidoCarta"> {{$carta->contenido}}</aside><a id="fechaHoraCarta">{{$carta->fecha}} &nbsp {{$carta->hora}}</a>
              <input type="checkbox" name="cont_cartas_rojas[]" value="{{$carta->cod_car}}" style="position: relative !important; visibility: visible !important; margin-left: 40px; width: 20px; height: 20px;">
              <span class="badge badge-primary">{{$carta->estado}}</span>
              <p>-------------------------------------------<p>  
          </aside>
        @endif    
      @endforeach
      
    </div>
    <!-- FIN CONTENIDO CARTAS ROJAS-->
    
    <!--CONTENIDO CARTAS AMARILLAS-->
    <div class="content-3">
      
        @foreach($cartas_amarillas as $carta)
        @if($carta->estado == "visto" || $carta->estado == "nuevo")
        
        <aside class="cartaCompleta">   
          <img src="{{asset('assets/img/amarillo.png')}}" height="5px" width="280px">
          <a href="#" onClick="Mostrar('{{$carta->cod_car}}', '{{$carta->autor}}','{{$carta->hora}}','{{$carta->fecha}}', '{{$carta->contenido}}' );"
            data-toggle="modal" data-target="#exampleModal" >[ver carta] </a>
 
            <aside id="contenidoCarta" onclick="alert('LeyendoCarta');">{{$carta->contenido}}</aside><a id="fechaHoraCarta">{{$carta->fecha}} &nbsp {{$carta->hora}} </a> 
            <input type="checkbox" name="cont_cartas_amarillas[]" value="{{$carta->cod_car}}" style="position: relative !important; visibility: visible !important; margin-left: 40px; width: 20px; height: 20px; ">
            <span class="badge badge-primary">{{$carta->estado}}</span>
            <p>-------------------------------------------<p>      
        </aside>
        @endif
        @endforeach
            
    </div>
    <!--FIN CONTENIDO CARTAS AMARILLAS-->

    <!--CONTENIDO CARTAS VERDES-->
    <div class="content-4">
        @foreach($cartas_verdes as $carta)
        @if($carta->estado == "visto" || $carta->estado == "nuevo")
        
            <aside class="cartaCompleta">
            <img src="{{asset('assets/img/verde.png')}}" height="5px" width="280px">
            <a href="#" onClick="Mostrar('{{$carta->cod_car}}','{{$carta->autor}}','{{$carta->hora}}',
              '{{$carta->fecha}}','{{$carta->contenido}}');"

            data-toggle="modal" data-target="#exampleModal">[ver carta]</a>
            <aside id="contenidoCarta" onClick="alert('hola')"> {{$carta->contenido}}</aside><a id="fechaHoraCarta">{{$carta->fecha}} &nbsp {{$carta->hora}}</a><input type="checkbox" name="cont_cartas_verdes[]"
             value="{{$carta->cod_car}}" style="position: relative !important; visibility: visible !important; margin-left: 40px; width: 20px; height: 20px;">
            <span class="badge badge-primary">{{$carta->estado}}</span>
            <p>-------------------------------------------<p>  
        </aside>
        @endif      
        @endforeach
    </div>
  <!-- FIN CONTENIDO CARTAS VERDES-->
      </div>
</div>
<!--
 <input type="submit" value="" onclick = "location='#'" style="background-image: url('{{asset('assets/img/botonCrearBoletin.png')}}'); 
              background-size: contain; height: 40px; width: 143px; right: 300px; position: absolute;" />
-->
<br>
  <input type="submit" name="enviar" value="Crear Información" 
      class="btn btn-warning" style="margin-left: 50%; width:10em;">

    


   </form>
    <!--MOSTRAR CON MODAL LA CARTA SELECCIONADA-->
    @include("../correo/mostrar_carta")

    <script>
  
    var Mostrar = function(id, autor,hora,fecha,contenido)
      {  
        $('#id').val(id);
        $('#autor').val(autor);
        $('#hora').val(hora);
        $('#fecha').val(fecha);
        $('#contenido').val(contenido); 


      }    


    </script>
@endsection

@endif
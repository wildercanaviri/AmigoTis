
@if($carta->color_car == "Rojo" && ($carta->estado == "visto" || $carta->estado == "nuevo"))
    
    <aside class="cartaCompleta">

    <img src="{{asset('assets/img/rojo.png')}}" height="5px" width="280px">
    <a href="#" onClick="Mostrar( '{{$carta->cod_car}}','{{$carta->autor}}','{{$carta->hora}}','{{$carta->fecha}}','{{$carta->contenido}}');"  
    data-toggle="modal" data-target="#exampleModal">[ver carta]</a> 

    <aside id="contenidoCarta"> {{$carta->contenido}} </aside><a id="fechaHoraCarta">{{$carta->fecha}} &nbsp {{$carta->hora}}
    </a>

    <input type="checkbox" name="cont_principal_rojas[]" value="{{$carta->cod_car}}" style="position: relative !important; visibility: visible !important; margin-left: 40px; width: 20px; height: 20px;">

    <span class="badge badge-primary">{{$carta->estado}}</span>
    <p>-------------------------------------------<p> 
    </aside>
@endif
    
@if($carta->color_car == "Amarillo" && ($carta->estado == "visto" || $carta->estado == "nuevo"))
    <aside class="cartaCompleta">  
    <img src="{{asset('assets/img/amarillo.png')}}" height="5px" width="280px">
   
    <a href="#" onClick="Mostrar('{{$carta->cod_car}}', '{{$carta->autor}}','{{$carta->hora}}','{{$carta->fecha}}','{{$carta->contenido}}' );" data-toggle="modal" 
    data-target="#exampleModal">[ver carta]</a>
   
    <aside id="contenidoCarta" onclick="alert('LeyendoCarta');">{{$carta->contenido}}</aside><a id="fechaHoraCarta">{{$carta->fecha}} &nbsp {{$carta->hora}} </a> <input type="checkbox" name="cont_principal_amarillas[]" value="{{$carta->cod_car}}" style="position: relative !important; visibility: visible !important; margin-left: 40px; width: 20px; height: 20px; ">
    <span class="badge badge-primary">{{$carta->estado}}</span>
    <p>-------------------------------------------<p>      
    </aside>
@endif
    
@if($carta->color_car == "Verde" && ($carta->estado == "visto" || $carta->estado == "nuevo"))
    <aside class="cartaCompleta">
    <img src="{{asset('assets/img/verde.png')}}" height="5px" width="280px">
    <a href="#" onClick="Mostrar('{{$carta->cod_car}}', '{{$carta->autor}}','{{$carta->hora}}','{{$carta->fecha}}','{{$carta->contenido}}' );" data-toggle="modal" 
    data-target="#exampleModal">[ver carta]</a>

    <aside id="contenidoCarta"> {{$carta->contenido}}</aside><a id="fechaHoraCarta">{{$carta->fecha}} &nbsp {{$carta->hora}}</a><input type="checkbox" name="cont_principal_verdes[]" value="{{$carta->cod_car}}"
    style="position: relative !important; visibility: visible !important; margin-left: 40px; width: 20px; height: 20px; ">
    <span class="badge badge-primary">{{$carta->estado}}</span>
    <p>-------------------------------------------<p>
  
    </aside>
@endif



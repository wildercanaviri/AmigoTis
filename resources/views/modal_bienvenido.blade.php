 

@if (Auth::guest())
<!---->
 <div class="text-center">
                <a href="#myModal" class="trigger-btn" data-toggle="modal">Bienvenido</a>
</div>   
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Bienvenido al Amigo Mensajero</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <img src="{{asset('assets/img/carusel/hola.png')}}" class="d-block w-100" width="100" height="300" >
       <p>Hola amigo, puedes dirigirte a <b>Escribe tu Carta</b> para comenzar a contarle alguna anéctoda o cuento al Amigo Mensajero</p>
      </div>
      <div class="modal-footer">
        <button type="button"class="btn btn-success" data-dismiss="modal" >Gracias Amigo Mensajero
        </button>

      </div>
    </div>
  </div>
</div>
@else
<div class="text-center">
  <a href="#myModal" class="trigger-btn" data-toggle="modal">Bienvenido</a>
</div>   

@endif
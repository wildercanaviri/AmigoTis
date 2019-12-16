<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Carta del niño</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="cambiar_leido" method="post">
         {{csrf_field()}}
      <div class="modal-body">
          <div class="form-group row">
              <label for="autor" class="col-sm-2 col-form-label"><b>Autor</b></label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="autor">
              </div>
         </div>

         <div class="form-group row">
              <label for="hora" class="col-sm-2 col-form-label"><b>Hora</b></label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="hora">
              </div>
         </div>

         <div class="form-group row">
              <label for="fecha" class="col-sm-2 col-form-label"><b>Fecha</b></label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="fecha">
              </div>
         </div>

         <div class="form-group">
          <label for="contenido"><b>Contenido de la carta</b></label>
          <textarea  readonly class="form-control" id="contenido" rows="5" style="resize: none;"></textarea>
        </div>
         
        <input type="text" name="id" id="id" hidden>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" >Cerrar</button>        
        </div>

      
</form>

  </div>
</div>

 
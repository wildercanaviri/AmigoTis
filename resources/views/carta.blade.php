<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AMIGO MENSAJERO</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Concert+One&display=swap" rel="stylesheet">
        <!-- Corrector Ortográfico -->
        <script type="text/javascript" src="gspell/AJS.js">
        </script>
        <script type="text/javascript" src="gspell/googiespell.js">
        </script>
        <script type="text/javascript" src="gspell/cookiesupport.js">
        </script>
        <link href="gspell/googiespell.css" type="text/css"
        rel="stylesheet" media="all" />
      
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
        <link href="{{asset('assets/css/draganddrop.css')}}" rel="stylesheet">
        <link rel="stylesheet" type="text/css"  href="{{asset('assets/css/modal_enviar.css')}}">
        <script src="{!! asset('assets/js/dragandrop.js') !!}"></script>
        <style type="text/css">
          .atras{
            /*position: relative;*/
          }
          .sobre {
             /*position:absolute;
             top:0px;
             left:0px;
             border:none;*/
          }
        </style>
        <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}">
    </head>
    <body>
    @extends("layout.plantilla")
      @section("cabecera") 
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(255,192,0);">
                  
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
              
                  <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8000/inicio">Inicio</a>
                      </li>
                      <li class="nav-item active">
                        <a class="nav-link" href="http://localhost:8000/carta" style="text-decoration: underline;">Escribe tu Carta<span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8000/boletin">Boletín</a>
                      </li>
                      @if (Auth::guest())
                        
                    @else
                       <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8000/usuarios">Usuarios</a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="http://localhost:8000/roles">Roles</a>
                      </li>
                    @endif
                    </ul>
                  </div>
                </nav> 
        <div class="panelIzquierda">
         
           <div  id="cajaimagen" ondragenter="return enter(event)" ondragleave="return leave(event)" ondrop="return clonar(event)" >
                          <img class="imagen" src= "{{asset('assets/img/default/mama_coco.png')}}"  id="img" draggable="true" ondragstart="start(event)" ondragend="end(event)">
                          <img class="imagen" src ="{{asset('assets/img/default/auto.png')}}" id = "img1"  draggable="true" ondragstart="start(event)" ondragend="end(event)">
                          <img class="imagen" src ="{{asset('assets/img/default/minecraft.png')}}" id = "img2"  draggable="true" ondragstart="start(event)" ondragend="end(event)">
                          <img class="imagen" src ="{{asset('assets/img/default/Perro.png')}}" id = "img3"  draggable="true" ondragstart="start(event)" ondragend="end(event)">

          </div>
            <div>
              <div style="color: white; font-weight: bold; margin-left: 40px;margin-top: 300px;">
                  Borrar <br>Imagen                    
              </div>
              <div  class = "papelera" id="papelera" ondragenter="return enter(event)" ondragover="return over(event)" ondragleave="return leave(event)" ondrop="return eliminar(event)" style="background-image: url('{{asset('assets/img/basurero.png')}}');"> 
              </div>
   
            </div>
        </div>   
       
     


      
           <div class="panelCentral">
        
         <!-- <form ondragstart="return false;" ondrop="return false;" action="/carta" method="post" enctype="multipart/form-data" name="form1" >
         -->
         <form action="/carta" method="post" enctype="multipart/form-data" name="form1" >
        {{csrf_field()}}
         <input type="file"  class= "eligir_archivos" name="mi_imagen[]" id="file-upload" multiple="true" style="color: white;margin-left: 20px;margin-bottom: 20px; ">
         <div class="contenedorPerrito" >
              <img src="{{asset('assets/img/perrito.png')}}" height="200px" width="300px" id="imagenPerrito" />
              
              <div class="centradoMiNombreEs">
                <textarea id="cajaPerrito" name="campo_nombre" placeholder="Mi nombre es..."></textarea>
              </div>
                <img src="{{asset('assets/img/imagenGlobito.png')}}" height="100px" width="430px" id="imagenGlobito" />
              <div class="centrado2HolaSoyLucas">Hola... soy Lucas<br>
              ¿Cómo te llamas?
              </div>
        </div>
        <section class="atras" style="text-align: center;">
              <div class="example sobre" >
                <img src="{{asset('assets/img/cuaderno.png')}}" style=" margin-top: -71px;margin-left: -70px;" width="82%" height="450px">
                
                

                <textarea id="texto" cols="56" rows="8" class="textarea" name="contenido" placeholder="Esta es una prueba" required="true"></textarea>

                <!--  
                <img src="{{asset('assets/img/botonEnviar.png')}}" height="80px" width="180px" onclick="alert('Se enviará la carta al Amigo Mensajero');" style="cursor: pointer; margin-left: 50px;">
               !-->
                <input type="submit" name="EnviarCarta" value="" style="background-image: url('{{asset('assets/img/botonEnviar.png')}}'); 
                background-size: contain; height: 89px; width: 190px; margin-left: 50px; position: absolute; top: 520px; " onclick="if" data-toggle="modal" data-target="#exampleModalCenter">
                @include("../cartaenviada")
            </div>
          </section> 
           <section id="clonado" ondragenter="return enter(event)" ondragover="return over(event)" ondragleave="return leave(event)" ondrop="return clonar(event)" style="overflow: scroll;">
              <output id="list" for="mi:_imagen[]"></output>
            </section>
      </form>
      </div>
       
        

            <div style="position: absolute; right: 120px; top: 320px;">
            <img src="{{asset('assets/img/microfono.png')}}" height="120px" width="120px" onclick="procesar()" style="cursor: pointer;">
            <div>
            <button onclick="procesar()" id="procesar"> Dictar por Voz</button>
            </div>
        </div>
            
            <script>
            /*  
    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
 
            reader.onload = function (e) {
                var filePreview = document.createElement('img');
                filePreview.id = 'file-preview';
                //e.target.result contents the base64 data from the image uploaded
                filePreview.src = e.target.result;
                console.log(e.target.result);
 
                var previewZone = document.getElementById('clonado');
                
                previewZone.appendChild(filePreview);
                var img1 = document.getElementById('file-preview');
                //img1.width=120;
                //img1.height=120;
                img1.className = "imagen";
                img1.draggable = true;
                img1.ondragstart=function start(e){
                  e.dataTransfer.effecAllowed = 'move'; // Define el efecto como mover (Es el por defecto)
            e.dataTransfer.setData("Data", e.target.id); // Coje el elemento que se va a mover
            e.dataTransfer.setDragImage(e.target,0,0); // Define la imagen que se vera al ser arrastrado el elemento y por donde se coje el elemento que se va a mover (el raton aparece en la esquina sup_izq con 0,0)
            e.target.style.opacity = '0.4';
                };
                img1.ondragend=function end(e){
                  e.target.style.opacity = ''; // Pone la opacidad del elemento a 1           
            e.dataTransfer.clearData("Data");
                };
            }
 
            reader.readAsDataURL(input.files[0]);
        }
    }
 
    var fileUpload = document.getElementById('file-upload');
    fileUpload.onchange = function (e) {
        readFile(e.srcElement);
    }
 */
function openImage() { //Esta función validaría una imágen
        
      var input = this;
      var file = input.files[0];
      var fileName = input.value;
      var maxSize = 1048576; //bytes
      var extensions = new RegExp(/.jpg|.jpeg|.png|.gif/i); //Extensiones válidas

      var error = {
          state: false,
          msg: ''
      };

      if (this.files && file) {

          for (var i = fileName.length-1; i >= 0; i--) {

              if (fileName[i] == '.') {

                  var ext = fileName.substring(fileName[i],fileName.length);

                  if (!extensions.test(ext)) {
                      error.state = true;
                      error.msg+= 'La extensión del archivo no es válida.<br>';
                  }

                  break;
              }

          }

          if (file.size > maxSize) {
              error.state = true;
              error.msg += 'La imágen no puede ocupar más de '+maxSize/200+' KB.';
          }

          if (error.state) {
              input.value = '';
              document.getElementById("clonado").innerHTML = error.msg;
              return;
          } else {
            document.getElementById("clonado").innerHTML = "";
          }
         
          var reader = new FileReader();

          reader.onload = function(e) {
           //   document.getElementById("img").src = e.target.result;
                var filePreview = document.createElement('img');
                filePreview.id = 'file-preview';
                //e.target.result contents the base64 data from the image uploaded
                filePreview.src = e.target.result;
                console.log(e.target.result);
 
                var previewZone = document.getElementById('clonado');
                
                previewZone.appendChild(filePreview);
                var img1 = document.getElementById('file-preview');
                //img1.width=120;
                //img1.height=120;
                img1.className = "imagen";
                img1.draggable = true;
                img1.ondragstart=function start(e){
                  e.dataTransfer.effecAllowed = 'move'; // Define el efecto como mover (Es el por defecto)
            e.dataTransfer.setData("Data", e.target.id); // Coje el elemento que se va a mover
            e.dataTransfer.setDragImage(e.target,0,0); // Define la imagen que se vera al ser arrastrado el elemento y por donde se coje el elemento que se va a mover (el raton aparece en la esquina sup_izq con 0,0)
            e.target.style.opacity = '0.4';
                };
                img1.ondragend=function end(e){
                  e.target.style.opacity = ''; // Pone la opacidad del elemento a 1           
            e.dataTransfer.clearData("Data");
                };

          }
          reader.readAsDataURL(this.files[0]);
        }
  }
    document.getElementById("file-upload").addEventListener("change",openImage,false); //Añadimos un evento al input para que se dispare cuando el usuario seleccione otro archivo
</script>
        @endsection 
        <script type="text/javascript" src="{!! asset('assets/js/mot_recon_voz.js') !!}" async></script>
        <script type="text/javascript" src="{!! asset('assets/js/vistaPrevia.js') !!}" async></script>
    </body>
</html>

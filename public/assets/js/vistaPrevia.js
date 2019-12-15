
/*var archivoImput = document.getElementById('mi:_imagen[]');
document.getElementById('mi:_imagen[]').addEventListener('change', handleFileSelect, false);
alert("holamundo");
function handleFileSelect(evt) {
  var files = evt.target.files; // FileList object
  alert("puta madre");
  
  for (var i = 0, f; f = files[i]; i++) {

    // Only process image files.
    if (!f.type.match('image.*')) {
      continue;
    }

    var reader = new FileReader();

    // Closure to capture the file information.
    reader.onload = (function(theFile) {
      return function(e) {
        // Render thumbnail.
        var span = document.createElement('span');
        span.innerHTML = ['<img class="imagen" src="', e.target.result,
                          '" title="', escape(theFile.name), '"/>'].join('');
        document.getElementById('list').insertBefore(span, null);
      };
    })(f);

    // Read in the image file as a data URL.
    reader.readAsDataURL(f);
  }
}
*/
var id = 0;
function validarExt(e)
{
    var files =   e.target.files;
    var archivoInput = document.getElementById('mi:_imagen[]');
    var archivoRuta = archivoInput.value;
    id = id +1; 
    //for (var i = 0, f; f = files[i]; i++) {
    // alert(f.src);
   
    var extPermitidas = /(gif|jpeg|jpg|png)$/i;
    
    if(!extPermitidas.exec(archivoRuta)){
        alert('solo se adminten tipos png ,jpg , jpg');
        archivoInput.value = '';
        return false;
    }

    else
    {
        if (archivoInput.files && archivoInput.files[0]) 
        {
            var visor = new FileReader();
            visor.onload = function(e) 
            {
                document.getElementById('clonado').innerHTML = 
                '<img src="'+e.target.result+'" draggable="true" ondragstart="start(event)" ondragend="end(event)" class="imagen"  id="'+id+'"/>';
            };
            visor.readAsDataURL(archivoInput.files[0]);
        }
    } 
    // }
}


contador = 0; // Variable global para tener poder poner un id unico a cada elemento cuando se clona.
        function start(e) {
            e.dataTransfer.effecAllowed = 'move'; // Define el efecto como mover (Es el por defecto)
            e.dataTransfer.setData("Data", e.target.id); // Coje el elemento que se va a mover
            e.dataTransfer.setDragImage(e.target,0,0); // Define la imagen que se vera al ser arrastrado el elemento y por donde se coje el elemento que se va a mover (el raton aparece en la esquina sup_izq con 0,0)
            e.target.style.opacity = '0.4'; 
        }

        function end(e){
            e.target.style.opacity = ''; // Pone la opacidad del elemento a 1           
            e.dataTransfer.clearData("Data");
        }

        function enter(e) {
            e.target.style.border = '3px dotted #555'; 
        }

        function leave(e) {
            e.target.style.border = ''; 
        }

        function over(e) {
            var elemArrastrable = e.dataTransfer.getData("Data"); // Elemento arrastrado
            var id = e.target.id; // Elemento sobre el que se arrastra
            
            // return false para que se pueda soltar
            if (id == 'cajaimagen'){
                return false; // Cualquier elemento se puede soltar sobre la seccion destino 1
            }
            if (id == 'clonado'){
                return false;
            }
            if (id == 'papelera'){
                return false; // Cualquier elemento se puede soltar en la papelera
            }
        }

    
        /**
        * 
        * Mueve el elemento
        *
        **/
        function drop(e){
            var elementoArrastrado = e.dataTransfer.getData("Data"); // Elemento arrastrado
            e.target.appendChild(document.getElementById(elementoArrastrado));
            e.target.style.border = '';  // Quita el borde
            tamContX = $('#'+e.target.id).width();
            tamContY = $('#'+e.target.id).height();

            tamElemX = $('#'+elementoArrastrado).width();
            tamElemY = $('#'+elementoArrastrado).height();
    
            posXCont = $('#'+e.target.id).position().left;
            posYCont = $('#'+e.target.id).position().top;

            // Posicion absoluta del raton
            x = e.layerX;
            y = e.layerY;

            // Si parte del elemento que se quiere mover se queda fuera se cambia las coordenadas para que no sea asi
            if (posXCont + tamContX <= x + tamElemX){
                x = posXCont + tamContX - tamElemX;
            }

            if (posYCont + tamContY <= y + tamElemY){
                y = posYCont + tamContY - tamElemY;
            }

            document.getElementById(elementoArrastrado).style.position = "absolute";
            document.getElementById(elementoArrastrado).style.left = x + "px";
            document.getElementById(elementoArrastrado).style.top = y + "px";
        }

        /**
        * 
        * Elimina el elemento que se mueve
        *
        **/
        /*function eliminar(e){
            
            var id = e.target.id;
            var elementoArrastrado = document.getElementById(e.dataTransfer.getData("Data")); // Elemento arrastrado
            car imagenes = document.querySelectorAll('#cajaimagen img');
            var paraEliminar=false;
            for(var i=0;i<imagenes.length;i++){
                if((id=='papelera') && (elementoArrastrado.id == imagenes[i].id)){
                    paraEliminar=true;
                }

            }
            if(paraEliminar==true){
                elementoArrastrado.parentNode.removeChild(elementoArrastrado); // Elimina el elemento
                e.target.style.border = '';   // Quita el borde
            }
        }*/
         function eliminar(e){
            var elementoArrastrado = document.getElementById(e.dataTransfer.getData("Data")); // Elemento arrastrado
            var elem = elementoArrastrado.id;
            //alert(elem);
            if(elem==="img" || elem==="img1" || elem==="img2" || elem==="img3"){    
             }else{
                elementoArrastrado.parentNode.removeChild(elementoArrastrado); // Elimina el elemento
            e.target.style.border = '';   // Quita el borde
          
             }
        }


        /**
        * 
        * Clona el elemento que se mueve
        *
        **/
        function clonar(e){
            var elementoArrastrado = document.getElementById(e.dataTransfer.getData("Data")); // Elemento arrastrado
            elementoArrastrado.style.opacity = ''; // Dejamos la opacidad a su estado anterior para copiar el elemento igual que era antes
            var elementoClonado = elementoArrastrado.cloneNode(true); // Se clona el elemento
            elementoClonado.id = "ElemClonado" + contador; // Se cambia el id porque tiene que ser unico
            contador += 1;  
            elementoClonado.style.position = "static";  // Se posiciona de forma "normal" (Sino habria que cambiar las coordenadas de la posición)  
            e.target.appendChild(elementoClonado); // Se añade el elemento clonado
            e.target.style.border = '';   // Quita el borde del "cuadro clonador"
        }
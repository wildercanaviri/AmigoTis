<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AMIGO MENSAJERO</title>
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}">
    
    <style>
    #campos{
        width: 30%;
    }
    .contenido table{
         width:70%;
        margin: 0 auto;
        background:#FFFFFF;
        }
    
    /*thead{
        background-color: rgb(255,192,0);
        font-size: 14px;
        font-weight: bolder;
        }
*/
input:valid {
 
     border-color:#2ecc71;
     border-width: 1px;
     border-style: solid;
 
}
input:invalid{
     border-color:#E31010;
     border-width: 1px;
     border-style: solid;
 
}

        #idCampo{
            color: white;
            font-weight: bold;
            
        }


/*CSS PARA LA LLEGADA DE LOS CORREOS */

#contenedor {
    margin: 40px  auto 20px auto;
    width: 750px;  /* Ancho del contenedor */
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}

#contenedor input {
height: 32px;
visibility: hidden;
}

#contenedor label {
float: left;
cursor: pointer;
font-size: 15px;  /* Tamaño del texto de las pestañas */
line-height: 40px;
height: 40px;
width: 160px;
padding: 0 20px;
display: block;
color: #888;  /* Color del texto de las pestañas */
text-align: center;
/*border-radius: 5px 5px 0 0;*/
background: #eee;  /* Fondo de las pestañas */
margin-right: 5px;
}

#contenedor input:hover + label {

background: #ddd;  /* Fondo de las pestañas al pasar el cursor por encima */
color: #666;  /* Color del texto de las pestañas al pasar el cursor por encima */
}

#contenedor input:checked + label {
background: #FFFFFF;  /* Fondo de las pestañas al presionar */
color: #444; /* Color de las pestañas al presionar */
z-index: 6;
line-height: 45px;
height: 45px;
position: relative;
top: -5px;
-webkit-transition: .1s;
-moz-transition: .1s;
-o-transition: .1s;
-ms-transition: .1s;
}

.content {
background: #FFFFFF;  /* Fondo del contenido */
position: relative;
width: 100%;
height: 350px;  /* Alto del contenido */
padding: 0px 30px;
z-index: 5;
/*border-radius: 0 5px 5px 5px;*/
overflow: scroll;
}

.content div {
position: absolute;
z-index: -100;
opacity: 0;
transition: all linear 0.1s;
}

#contenedor input.tab-selector-1:checked ~ .content .content-1,
#contenedor input.tab-selector-2:checked ~ .content .content-2,
#contenedor input.tab-selector-3:checked ~ .content .content-3,
#contenedor input.tab-selector-4:checked ~ .content .content-4 {
    z-index: 100;
    opacity: 1;
    -webkit-transition: all ease-out 0.2s 0.1s;
-moz-transition: all ease-out 0.2s 0.1s;
-o-transition: all ease-out 0.2s 0.1s;
-ms-transition: all ease-out 0.2s 0.1s;

}

/* FIN CSS PARA LA LLEGADA DE LOS CORREOS */

</style>
</head>
<body>
    @include("layout.fondo_nav")
   <div class="cabecera">
    @yield("cabecera")    
</div>
    <div class="contenido">
        @yield("contenido")
    </div>
    
    <div class="pie_pagina">
        @yield("pie_pagina")
    </div>
    


</body>
</html>
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Input;
use Validator;
use App\Carta;
use App\Imagen;
use Carbon\Carbon;
use App\Notificacion;

class CartasController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $mostrar_modal = false;
        $notificaciones=Notificacion::Notificacion("0")->paginate(10);
        return view('carta', compact("carta","notificaciones","mostrar_modal"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $mostrar_modal = false;
        $notificacion=new Notificacion();
        $notificacion->contenido=$request->contenido;
       
       
        $carta= new Carta();
        $carta->autor=$request->campo_nombre;
        $carta->contenido=$request->contenido;
       
        if(($request->contenido != null) || ($request->contenido != "") ){
            $mostrar_modal = true;
        }

        $carta->fecha=Carbon::now()->format('Y-m-d');
        $carta->hora=Carbon::now()->format('H:i:s');
        $contenido=strtoupper($request->contenido);
        $palabra_texto=explode(" ", $contenido);
        $array_peligrosas = array("MATAR", "MUERTE", "MORIRME", "SANGRE","MATANZA","ASESINAR","APUÑALAR",
            "TONTO","BABOSO","INUTIL","INUTILES","VIOLAR","IRRESPONSABLE","FRACASO","ODIO","INCOMPENTE","FLOJO",
            "ENOJON","RIDICULO","MATARE","DENUNCIARE","MALDECIR","MALDECIRE","VENGANZA","MASOQUISTA","MASOQUISMO",
            "ROBAR","ROBABA","MATABA","ACUCHILLAR","COJUDO","MIERDA","CARAJO","PUTA","LUJURIA","AVARACIA","GULA",
            "ORGULLO","DESINTERES","PEREZA","HUEVON","ALCAHUETE","PENDEJO","PETE","PITO");



        $array_correctas = array("ESTUDIO","LEER","CANTAR","REZAR","AGRADECER","DIOS","AMOR","CUIDARE","PLANTAS"
            ,"FAMILIA","HERMANOS","PADRES","BUENO","CUIDAME","GUSTA","ESTUDIAR","HERMOSA","HERMOSO","BELLO","BELLA"
            ,"MAGICO","SOLIDARIDAD","PAZ","MAMÁ","PAPÁ","ALABARE","GRACIAS","CURAR","ORAR","AVENTURA","DIVERTIDO",
            "ALEGRE","FELICIDAD","FELIZ","CARISMATICO","EXCELENTE","BIEN","BUENA","SALUDAR","BUEN","POSITIVO",
            "SALUDABLE","VERDURAS");
     
        //$array_normales = array("familia","casa","padre","madre","hermanos","navidad");
        $resultado="";

        for($i=0;$i<count($palabra_texto);$i++){
     
           $palabra=$palabra_texto[$i];
     
            for($j=0;$j<count($array_peligrosas);$j++){
        
                if($palabra==$array_peligrosas[$j]){
        
                    $resultado="Rojo";
                    $j=count($array_peligrosas);
                    $i=count($palabra_texto);      
                }
            }
        
            if($resultado==""){
            for($j=0;$j<count($array_correctas);$j++){
                if($palabra==$array_correctas[$j]){
                    $resultado="Verde";
                    $j=count($array_peligrosas);
                    $i=count($palabra_texto);
                }
            }
        } 
     }
     
        if($resultado==""){
            $resultado="Amarillo";
        }

    //FIN
        $carta->color_car=$resultado;
          $carta->estado="nuevo";  
        $carta->save();
        
         $notificacion->leido=0;
        $notificacion->color=$resultado;

        $notificacion->save();
        
        
        if($name = $_FILES["mi_imagen"]["name"][0] != null ){
            $total = count($_FILES["mi_imagen"]["name"]);

         
            for ($i=0; $i < $total; $i++) {     
                $imagenes = new Imagen();
                $imagenSubida="true";
                $tmp_name = $_FILES["mi_imagen"]["tmp_name"][$i];
                $name = $_FILES["mi_imagen"]["name"][$i];

                $tipo = $_FILES["mi_imagen"]["type"][$i];
                $tamano=$_FILES["mi_imagen"]["size"][$i];
                $imagenes->cod_car=$carta->id;
                $imagenes->nombre=$name;

                if ($_FILES["mi_imagen"]["size"][$i]>200000){
                    $msg='<script language="javascript">alert(" El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo");</script>';
                $imagenSubida="false";
                }


                if (!($_FILES["mi_imagen"]["type"][$i]== "image/jpg"
                || $_FILES["mi_imagen"]["type"][$i] == "image/png"
                || $_FILES["mi_imagen"]["type"][$i] == "image/jpeg"
                || $_FILES["mi_imagen"]["type"][$i] == "image/gif"))
                {
                $msg='<script language="javascript">alert(" Tu archivo tiene que ser JPG,PNG o GIF. Otros archivos no son permitidos");"</script>';
                $imagenSubida="false";
                }
                
                if($imagenSubida=="true"){
                     $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/../uploads/';
                      if(move_uploaded_file($tmp_name, $carpeta_destino.$name)){
                        $imagenes->ruta=$carpeta_destino;
                        $imagenes->tipo=$tipo;
                        $imagenes->save();

                        echo " Ha sido subido satisfactoriamente";  
                      }else{
                        echo " Error al subir el archivo";
                      }
                    }else{
                      echo $msg;

                 }
                
                
            }
            
        }
        return view('carta',compact("mostrar_modal"));
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

        public function cambiar_a_leido(Request $request){

         $id=$request->id;
        Carta::where('cod_car',$id)->update([
        'estado'=>"visto",
         ]);

        return redirect("/correo");
 

    }
}

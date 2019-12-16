<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notificacion;
use App\User ;
use App\Informacion;
use App\Http\Requests;

class InformacionController extends Controller
{
    public function index(){

    }
    public function create($id){
        $notificaciones=Notificacion::Notificacion("0")->paginate(10);
        $usuario=User::findOrFail($id);
        return view("informacion.create",compact("usuario","notificaciones"));
    }
    
    public function store(Request $request){
        $notificaciones=Notificacion::Notificacion("0")->paginate(10);
        $usuarios=User::buscar($request->buscar)->orderBy('id','DESC')->paginate(10);
        $informacion = new Informacion();        
        $informacion->especialidad = $request->especialidad;
        $informacion->user_id = $request->user_id;
        //$informacion->user_id = 2;
        //$usuario=User::findOrFail($request->user_id);
        
        $informacion->especialidad = $request->especialidad;
        $informacion->anio_esp =  $request->anio_es;
        $informacion->experiencia = $request->experiencia;
        $informacion->formacion  = $request->formacion;
        $informacion->uni_egr =  $request->universidad;
        $informacion->logros =  $request->logros;
        
        $i = 0;
        $imagenSubida="true";
            $tmp_name = $_FILES["mi_imagen"]["tmp_name"][$i];
            $name = $_FILES["mi_imagen"]["name"][$i];
            $tipo = $_FILES["mi_imagen"]["type"][$i];
            $tamano=$_FILES["mi_imagen"]["size"][$i];
            if ($_FILES["mi_imagen"]["size"][$i]>900000){
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
                $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/../uploads/fotousuario';
                if(move_uploaded_file($tmp_name, $carpeta_destino.$name)){
                    $informacion->perfil = $carpeta_destino;
                    $informacion->save();

                    echo " Ha sido subido satisfactoriamente";  
                    }else{
                    echo " Error al subir el archivo";
                    }
                    }else{
                      echo $msg;

                 }
            return view("usuarios.index",compact("usuarios","notificaciones"));
      }
}

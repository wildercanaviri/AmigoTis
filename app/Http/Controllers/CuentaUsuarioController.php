<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Notificacion;
use App\Carta;

class CuentaUsuarioController extends Controller
{
     public function configuracion()
    {
           $notificaciones=Notificacion::Notificacion("0")->paginate(10);
        return view('cuentaUsuario.configuracion',compact("notificaciones"));
    }
     public function informacionPersonal()
    {   $notificaciones=Notificacion::Notificacion("0")->paginate(10);
        return view('cuentaUsuario.informacionPersonal',compact("notificaciones"));
    }
      public function notificaciones(Request $request)
    {
         $notificaciones =Notificacion::Notificacion("0")->paginate(10);
        foreach($notificaciones as $notificacion){
                               
              $id=$notificacion->id;
              Notificacion::find($id)->update(['leido'=>1]);

        }  

        $cartas_buscador=Carta::Buscar($request->buscar)->paginate(10);
        $notificaciones=Notificacion::Notificacion("0")->paginate(10);
        $cartas_amarillas=Carta::Cartas("Amarillo")->paginate(10);
        
        $cartas_verdes=Carta::Cartas("Verde")->paginate(10);
        $cartas_rojas=Carta::Cartas("Rojo")->paginate(10);
        return view('cuentaUsuario.notificaciones',compact("notificaciones","cartas_rojas","cartas_verdes","cartas_amarillas","cartas_buscador"));
    }

    public function eliminar(Request $request)
    {
        
        $id=$request->id;
        $usuario=User::findOrFail($id);
        $usuario->delete();
        return redirect("/login");
    }

    public function actualizar(Request $request)
    {   

        $id=$request->id;
        
        User::where('id',$id)->update([
        'username'=>$request->username,
        'password'=>crypt($request->password,''),
         
         ]);
         /*if( $rol = 'administrador'){
            return view('welcome',compact("user","rol"));
            } 
            if($rol != 'administrador'){
            return view('usuarioGeneral.perfil' , compact("user","rol"));
            }*/
            return redirect("configuracion"); 
    }

    public function update(Request $request)
    {   
        $notificaciones=Notificacion::Notificacion("0")->paginate(10);
        $id=$request->id;
        
        User::where('id',$id)->update([
        'nom_usu'=>$request->nom_usu,
        'ape_usu'=>$request->ape_usu,
        'email'=>$request->email,
        'fecha_nac'=>$request->fecha_nac,
        'tel_usu'=>$request->tel_usu,
         ]);
        return view('cuentaUsuario.informacionPersonal',compact("notificaciones"));
    }

}

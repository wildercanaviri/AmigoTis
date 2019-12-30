<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


use App\User;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use App\Notificacion;
use Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {/*
        if($request->user() == null){
            return view("auth.login");
        }else{ 
        $request->user()->autorizeRoles(['administrador']);
        }*/
        $notificaciones=Notificacion::Notificacion("0")->paginate(10);
        if(\Auth::user()->can('ver_usuario')==false){
            return view("errors.403",compact("notificaciones"));
        }
        $usuarios=User::buscar($request->buscar)->orderBy('id','DESC')->paginate(10);
        return view("usuarios.index",compact("usuarios","notificaciones"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
    /*
         if($request->user() == null){
            return view("auth.login");
        }else{ 
        $request->user()->autorizeRoles(['administrador']);
        }*/
        $notificaciones=Notificacion::Notificacion("0")->paginate(10);
     if(\Auth::user()->can('crear_usuario')==false){
            return view("errors.403",compact("notificaciones"));
        }
        $roles=Role::all();
        return view("usuarios.create",compact("roles","notificaciones"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$nom_rol=$request->nom_rol;
        
        //$rol=Role::where('nom_rol',$nom_rol)->first();
        //echo $rol;
        $notificaciones=Notificacion::Notificacion("0")->paginate(10);
        if(\Auth::user()->can('crear_usuario')==false){
            return view("errors.403",compact("notificaciones"));
        }
        $usuarios=new User();
        
        $usuarios->nom_usu=$request->nom_usu;
        $usuarios->ape_usu=$request->ape_usu;
        $usuarios->email=$request->correo;
        $usuarios->fecha_nac=$request->fecha_nac;
        $usuarios->tel_usu=$request->tel_usu;
        $usuarios->username=$request->usuario;

        $clave = $request->contrasenia;

        $claveConf=$request->confirmcontrasenia;

        if ($clave==$claveConf) {
        $usuarios->password=crypt($clave,'');
        $usuarios->save();
        Session::flash('mensaje', 'El usuario se ha creado con exito');
        return redirect("/usuarios");
       }
       else
       {
        return "las contraseñas no coinciden";
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $notificaciones=Notificacion::Notificacion("0")->paginate(10);

        if(\Auth::user()->can('ver_usuario')==false){
            return view("errors.403",compact("notificaciones"));
        }
        $usuario=User::findOrFail($id);
        
        $role= $usuario->roles;
        
       
        
      //  return view('usuarios.show')->with('usuario','role','notificaciones');        
       return view("usuarios.show",compact("usuario","role","notificaciones"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
       $notificaciones=Notificacion::Notificacion("0")->paginate(10);

        if(\Auth::user()->can('editar_usuario')==false){

            return view("errors.403",compact("notificaciones"));
        }
    /*
        if($request->user() == null){
            return view("auth.login");
        }else{ 
        $request->user()->autorizeRoles(['administrador']);
        }*/
        //$notificaciones=Notificacion::Notificacion("0")->paginate(10);
        $roles=Role::all();
        $usuario=User::findOrFail($id);
        $rols = array();
        foreach ($usuario->roles as $rol) {
            $rols[] = $rol->name;
        }
        
        return view("usuarios.edit",compact("usuario","notificaciones","rols","roles"));
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
        //$usuario=User::findOrFail($id);
        //$usuario->update(($request->all()));
        
         User::where('id',$id)->update([
        'nom_usu'=>$request->nom_usu,
        'ape_usu'=>$request->ape_usu,
        'email'=>$request->correo,
        'fecha_nac'=>$request->fecha_nac,
        'tel_usu'=>$request->tel_usu,
         ]);
        if( $request->roles != null){ 
        $usur = User::findOrFail($id);
        $usur->roles()->sync($request->roles);
        }else{
            $rols = array();
           // dd($rols);
            $usur->roles()->sync($rols);  
        }
        return redirect("/usuarios");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $notificaciones=Notificacion::Notificacion("0")->paginate(10);

        if(\Auth::user()->can('eliminar_usuario')==false){
            return view("errors.403",compact("notificaciones"));
        }
        //$notificaciones=Notificacion::Notificacion("0")->paginate(10);
        $usuario=User::findOrFail($id);
        $usuario->delete();
        return redirect("/usuarios");
    }
    public function buscador(Request $request){
        $usuarios=User::buscar($request->buscar)->orderBy('id','DESC')->paginate(10);
        return view("usuarios.index",compact("usuarios"));
    }
}

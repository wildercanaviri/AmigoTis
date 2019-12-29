<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
//use App\Permiso;
//use App\Role;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use App\Notificacion;
class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        /*if($request->user() == null){
            return view("auth.login");
        }else{ 
        $request->user()->autorizeRoles(['administrador']);
        }
        */
       // $roles=Role::all();
       $notificaciones=Notificacion::Notificacion("0")->paginate(10);
       if(\Auth::user()->can('ver_rol')==false){
            return view("errors.403",compact("notificaciones"));
        }
       $roles=Role::all();
        return view("roles.index",compact("roles","notificaciones"));
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
        $request->user()->autorizeRoles('administrador');
        }*/
        $notificaciones=Notificacion::Notificacion("0")->paginate(10);
        if(\Auth::user()->can('crear_rol')==false){
            return view("errors.403",compact("notificaciones"));
        }
        //$notificaciones=Notificacion::Notificacion("0")->paginate(10);
        return view("roles.create",compact("notificaciones"));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
       $notificaciones=Notificacion::Notificacion("0")->paginate(10);
        if(\Auth::user()->can('crear_rol')==false){
            return view("errors.403",compact("notificaciones"));
        }
        $roles=new Role();
        $roles->name=$request->nom_rol;
        $roles->slug=$request->nom_rol;
        $roles->description=$request->descripcion;  
        $roles->save();
        return redirect("/roles");
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
        if(\Auth::user()->can('ver_rol')==false){
            return view("errors.403",compact("notificaciones"));
        }
         $rol = Role::findOrFail($id);
        return view("roles.show",compact("rol","notificaciones"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        
    /*
        if($request->user() == null){
            return view("auth.login");
        }else{ 
        $request->user()->autorizeRoles('administrador');
        }*/
        $notificaciones=Notificacion::Notificacion("0")->paginate(10);
        if(\Auth::user()->can('editar_rol')==false){
            return view("errors.403",compact("notificaciones"));
        }
        $rol = Role::findOrFail($id);
        $permisos=Permission::all();
        $permis = array();
        foreach($rol->permissions as $permiso){
            $permis[] = $permiso->name;
        }


        return view("roles.edit",compact("rol","permisos","permis","notificaciones"));
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
      $rol = Role::findOrFail($id);
        $rol->permissions()->sync($request->permisos);
        return redirect("/roles"); 
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

        if(\Auth::user()->can('eliminar_rol')==false){
            return view("errors.403",compact("notificaciones"));
        }
        $rol = Role::findOrFail($id);
        $rol->permissions()->detach();
        $rol->delete();  
        return redirect("/roles"); 
    }
    public function asignar(){
        $usrol = User::has('roles')->get();
        $notificaciones=Notificacion::Notificacion("0")->paginate(10);
        if(\Auth::user()->can('asignar_rol')==false){
            return view("errors.403",compact("notificaciones"));
        }
        $todos_usuarios=User::all();
        $usuarios=array();
       
        
        $roles=Role::all();

       foreach ($todos_usuarios as $usuario) {

            if(count($usuario->roles)==0){
                $id=$usuario->id;
                $aux=User::find($id);
                $usuarios[]=$aux;
            }
        }

    return view("roles.asignar",compact("usuarios","roles","notificaciones"));
    
    }


    //ASIGNAR ROLES A USUARIOS

    public function role_user(Request $request){
        
        $notificaciones=Notificacion::Notificacion("0")->paginate(10);
        if(\Auth::user()->can('asignar_rol')==false){
            return view("errors.403",compact("notificaciones"));
        }
        if(($request->user_id != "vacio") && ($request->roles != null) ){
            $usuario=User::findOrFail($request->user_id);
           $usuario->roles()->sync($request->roles);

        }
        $usuarios=User::buscar($request->buscar)->orderBy('id','DESC')->paginate(10);
        return view("usuarios.index",compact("usuarios","notificaciones"));
    }
}

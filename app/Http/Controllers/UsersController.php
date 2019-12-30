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
        $datos = [
        "nom_usu" => "",
        "ape_usu" => "",
        "correo" => "",
        "fecha_nac" => "",
        "tel_usu" =>"",
        "usuario"=>""
        ];
        $notificaciones=Notificacion::Notificacion("0")->paginate(10);
     if(\Auth::user()->can('crear_usuario')==false){
            return view("errors.403",compact("notificaciones"));
        }
        $roles=Role::all();
        return view("usuarios.create",compact("roles","datos","notificaciones"));
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
        $usuario=new User();
        
        $usuario->nom_usu=$request->nom_usu;
        $usuario->ape_usu=$request->ape_usu;
        $usuario->fecha_nac=$request->fecha_nac;
        $usuario->tel_usu=$request->tel_usu;
        
        $clave = $request->contrasenia;
        $claveConf=$request->confirmcontrasenia;
        if ($clave==$claveConf) {
        $usuario->password=crypt($clave,'');
        
        //VALIDAR USUARIOS CON CORREO,USUARIO REPETIDO 
        $user_repetido=false;
        $email_repetido=false;
        $todos_usuarios=User::all();
        $email=$request->correo;
        $username=$request->usuario;
        foreach ($todos_usuarios as $usu) {
            $usu_email= $usu->email;
            $usu_nom= $usu->username;
            
            if($usu_email==$email){
                $email_repetido=true;   
            }
            if($usu_nom==$username){
                $user_repetido=true;
            }
        }
        $datos=array();
        
        $datos = [
        "nom_usu" => $request->nom_usu,
        "ape_usu" => $request->ape_usu,
        "correo" => $request->correo,
        "fecha_nac" => $request->fecha_nac,
        "tel_usu" =>$request->tel_usu,
        "usuario"=>$request->usuario
        ];
        $roles=Role::all();
        if($user_repetido==true && $email_repetido==true){
                Session::flash('error_user', 'Este nombre de usuario no esta disponible');
                Session::flash('error_email', 'Este correo no esta disponible');
                return view('usuarios.create',compact("datos","roles","notificaciones"));
        }else if($user_repetido==true){
                Session::flash('error_user', 'Este nombre de usuario no esta disponible');
                return view('usuarios.create',compact("datos","roles","notificaciones"));
        }else if($email_repetido==true){
                Session::flash('error_email','Este correo no esta disponible');
                return view('usuarios.create',compact("datos","roles","notificaciones"));
        }else{
              Session::flash('mensaje_creado', 'El usuario se ha creado con exito');
              $usuario->email=$email;
              $usuario->username=$username;
              $usuario->save();
              return redirect("/usuarios");
        }
       //FIN VALIDAR CORREO
       }else{
       
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
        return view("usuarios.edit",compact("usuario","notificaciones"));
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
       // User::find($id)->roles()->sync([$request->role_id]);
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

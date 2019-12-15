<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use App\Notificacion;

class PermisosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       /* if($request->user() == null){
            return view("auth.login");
        }else{ 
        $request->user()->autorizeRoles(['administrador']);
        }*/
        $notificaciones=Notificacion::Notificacion("0")->paginate(10);
        if(\Auth::user()->can('ver_lista_permisos')==false){
            return view("errors.403",compact("notificaciones"));
        }
        $permisos=Permission::all();
        return view("permisos.index",compact("permisos","notificaciones"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
    public function asignar(Request $request){
      /*  if($request->user() == null){
            return view("auth.login");
        }else{ 
        $request->user()->autorizeRoles(['administrador']);
        }*/
        $notificaciones=Notificacion::Notificacion("0")->paginate(10);
       if(\Auth::user()->can('asignar_permiso')==false){
            return view("errors.403",compact("notificaciones"));
        }
       $permisos=Permission::all();
       $roles = Role::all();
       return view("permisos.asignar",compact("permisos","roles","notificaciones"));
    
    }
    public function asignado(Request $request)
    {   
        if(($request->role_id != "vacio") && ($request->permisos != null) ){
            $rol=Role::findOrFail($request->role_id);
            $rol->permissions()->sync($request->permisos);
        }
        return redirect("/roles");
    }
}

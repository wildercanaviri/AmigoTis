<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Notificacion;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$user = Auth::user();
        $notificaciones=Notificacion::Notificacion("0")->paginate(10);
         if($request->user() == null){
            return view("auth.login");
        }else{ 
        $request->user()->autorizeRoles(['administrador']);
        }
       
        return view('administrador.index',compact('user','notificaciones'));
    
    }

  
    public function store(Request $request)
    {
       
    }
  
}

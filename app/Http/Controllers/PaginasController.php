<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notificacion;
class PaginasController extends Controller
{
    public function inicio(){
    	$notificaciones=Notificacion::Notificacion("0")->paginate(10);
    	return view("welcome",compact("notificaciones"));
    }

    public function carta(){
    
    	return view("carta");
    }

    public function boletin(){
        $notificaciones=Notificacion::Notificacion("0")->paginate(10);
    	return view("boletin",compact("notificaciones"));
    }


}

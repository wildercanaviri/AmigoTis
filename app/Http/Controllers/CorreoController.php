<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Carta;
use App\Notificacion;
use App\Contenido;
use Carbon\Carbon;
class CorreoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*if($request->user() == null){
            return view("auth.login");
        }else{ 
        $request->user()->autorizeRoles(['administrador']);
        }*/
        $notificaciones=Notificacion::Notificacion("0")->paginate(10);
         if(\Auth::user()->can('ver_correo')==false){
            return view("errors.403",compact("notificaciones"));
        }
       $cartas_buscador=Carta::Buscar($request->buscar)->paginate(10);

        $cartas_todas=Carta::all();

        $cartas_rojas=Carta::Cartas("Rojo")->paginate(10);
        
        $cartas_amarillas=Carta::Cartas("Amarillo")->paginate(10);
        
        $cartas_verdes=Carta::Cartas("Verde")->paginate(10);

        return view("correo.index",compact("cartas_buscador","cartas_todas","cartas_rojas","cartas_amarillas",
            "cartas_verdes","notificaciones"));
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
     public function generarNuevaInformacion(Request $request)
    {
        $notificaciones=Notificacion::Notificacion("0")->paginate(10);
      if(\Auth::user()->can('generar_informacion')==false){
            return view("errors.403",compact("notificaciones"));
        }
        $a=(array)($request->cont_principal_rojas);
        $b=(array)($request->cont_principal_amarillas);
        $c=(array)($request->cont_principal_verdes);
        $d=(array)($request->cont_cartas_rojas);
        $e=(array)($request->cont_cartas_amarillas);
        $f=(array)($request->cont_cartas_verdes);

    $todas_cartas=array_merge($a,$b,$c,$d,$e,$f);
    $todas_cartas=array_unique($todas_cartas);
        

       $cartas=array();
        for($i=0;$i < count($todas_cartas);$i++){
           $cartas[]=Carta::GetCarta($todas_cartas[$i])->get();
        }
        
        //dd($cartas == []);
        return view('correo.generarContenido', compact("cartas","notificaciones"));
    }
    public function InformacionObtenida(Request $request){

        foreach ($request->codigos as $id) {
            
            Carta::where('cod_car',$id)->update([
            'estado'=>"atendido",
            ]);
        }

        $contenido=new Contenido();
        $contenido->contenido=$request->cont_nuevo;
        $contenido->fecha=Carbon::now()->format('Y-m-d');
        $contenido->hora=Carbon::now()->format('H:i:s');
        $contenido->save();
        return redirect("/correo");
    }
}


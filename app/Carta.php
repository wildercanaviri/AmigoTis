<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
   protected $fillable = ["nom", "contenido", "fecha","color_car","estado"];
    
    public function imagenes(){
    	return $this->hasMany('App\Imagen', 'cod_car');
    }
    
    public function scopeCartas($query, $color){
        return $query->where('color_car',$color);
                           
    }
    
    public function scopeBuscar($query,$buscar){   
        
        //return $query->where('nom_usu','LIKE','%' . $buscar . '%');
        return $query->where('autor','LIKE','%' . $buscar . '%')
                     ->orWhere('contenido','LIKE','%' . $buscar . '%');
        
    }
    public function scopeGetCarta($query,$id){
        return $query->where('cod_car',$id);
    }
}

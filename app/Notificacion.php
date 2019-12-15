<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    //
    protected $fillable = ["contenido","leido"];
    
    public function scopeNotificacion($query, $leido){

        return $query->where('leido',$leido);
    }
}

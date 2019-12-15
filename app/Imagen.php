<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
   protected $fillable=["cod_car", "ruta", "tipo"];
}

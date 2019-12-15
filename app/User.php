<?php

namespace App;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    
    use ShinobiTrait;
    /*
    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function autorizeRoles($roles){
        if($this->hasAnyRole($roles)){
            return true;
        }
        abort(401,'Esta Sección no esta autorizada');
    }

    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach ($roles as $role) {
                if($this->hasRole($role)){
                    return true;
                }    
            }
        }else{
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }

    //validar si el usuario tiene ese rol
    public function hasRole($role){
        if($this->roles()->where('nom_rol',$role)->first()){
            return true;
        }
        return false;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom_usu', 'ape_usu', 'email', 'fecha_nac','tel_usu','username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];
    
    
    public function scopeBuscar($query,$buscar){   
        
        //return $query->where('nom_usu','LIKE','%' . $buscar . '%');
        return $query->where('nom_usu','LIKE','%' . $buscar . '%')
                    ->orWhere('ape_usu','LIKE','%' . $buscar . '%')
                    ->orWhere('email','LIKE','%' . $buscar . '%');
        
    }



    /*
     public function getRolesList(){
        return $this->roles->list('id')->all();
    }

    public function getPermisos($permis){
        $valor = 0;
        foreach( $this->roles as $rol){
            foreach($rol->permisos as $permiso ){
                if($permiso->nom_per == $permis ){
                    $valor = 1;
                }
            }
        }
        return $valor;
    }*/
}

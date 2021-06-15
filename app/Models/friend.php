<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class friend extends Model
{
    /*
    * CARMELO SI VES ESTO SE QUE LAS CLASES VAN CON LA PRIMERA LETRA MAYUSCULA
    * PERO SE ME HA AUTOGENERADO ASI Y POR NO HACERLO OTRA VEZ LO DEJÉ ASI PERDONAME :(
    */
    use HasFactory;
    
    
    protected $table = 'friend';
    protected $fillable = ['nombre','fecha_nac','numero'];
    
    function llamadas(){
        return $this->hasMany('App\Models\call', 'idAmigo');
    }
    
    
}

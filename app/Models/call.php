<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class call extends Model
{
    
    /*
    * CARMELO SI VES ESTO SE QUE LAS CLASES VAN CON LA PRIMERA LETRA MAYUSCULA
    * PERO SE ME HA AUTOGENERADO ASI Y POR NO HACERLO OTRA VEZ LO DEJÉ ASI PERONAME :(
    */
    
    use HasFactory;
    protected $table = 'call';
    protected $fillable = ['idAmigo','fecha_llamada'];
    
    function amigo(){
        return $this->belongsTo('App\Models\friend', 'idAmigo');
    }
}

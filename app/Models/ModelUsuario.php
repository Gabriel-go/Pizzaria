<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelUsuario extends Model
{
    Protected $table='usuario';
    Protected $fillable=['nome','senha','id_funcao','email'];

    public function relFuncao()
    {
        return $this->hasOne('App\Models\ModelFuncao','id','id_funcao');
    }
}

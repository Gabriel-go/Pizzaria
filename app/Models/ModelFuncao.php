<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelFuncao extends Model
{
    protected $table = 'funcao';
    protected $fillable = ['descricao'];

    public function relUsuario()
    {
        return $this->hasMany('App\Models\ModelUsuario','id_funcao');
    }
}

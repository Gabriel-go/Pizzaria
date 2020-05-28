<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelClienteTelefone extends Model
{
    Protected $table='cliente_telefone';
    Protected $fillable=['telefone','id_cliente'];
    
    public function relCliente()
    {
        //return $this->hasOne('App\Models\ModelCliente','id','id_cliente');
    }
}

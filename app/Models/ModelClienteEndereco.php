<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelClienteEndereco extends Model
{
    protected $table = 'cliente_endereco';
    protected $fillable = ['id','id_cliente','rua','bairro','referencia','complemento','numero'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelAdicional extends Model
{
    Protected $table='Adicional';
    Protected $fillable=['descricao','preco'];
}

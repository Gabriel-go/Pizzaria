<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPedido extends Model
{
    Protected $table='pedido';
    Protected $fillable=['id_cliente','data','status','id_situacao'];
}

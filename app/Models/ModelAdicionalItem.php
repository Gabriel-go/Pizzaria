<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelAdicionalItem extends Model
{
    Protected $table='adicional_item';
    Protected $fillable=['quantidade_adicional','preco_adicional','id_pedido_item'];
}

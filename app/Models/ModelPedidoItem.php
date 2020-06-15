<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPedidoItem extends Model
{
    Protected $table='pedido_item';
    Protected $fillable=['id_pizza1','id_pizza2','quantidade','tamanho','preco','id_pedido'];
}

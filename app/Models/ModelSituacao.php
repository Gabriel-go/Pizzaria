<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelSituacao extends Model
{
    Protected $table='situacao';
    Protected $fillable=['id_usuario','id_pedido','dt_evento', 'hr_evento','tipo_evento'];
}

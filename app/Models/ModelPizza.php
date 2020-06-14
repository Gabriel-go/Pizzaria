<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPizza extends Model
{
    Protected $table='Pizza';
    Protected $fillable=['descricao','ingredientes'];
}

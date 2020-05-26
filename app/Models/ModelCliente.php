<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelCliente extends Model
{
    protected $table = 'cliente';
    protected $fillable = ['id','dt_aniversario','email','nome'];
    
}

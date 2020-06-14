<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function session($objUsuario){
        Session::forget(['id','nome','email','id_funcao']);
        Session::put('id',$objUsuario->id);
        Session::put('nome',$objUsuario->nome);
        Session::put('email',$objUsuario->email);
        Session::put('id_funcao',$objUsuario->id_funcao);
        
    }
}

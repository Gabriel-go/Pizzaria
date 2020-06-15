<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelSituacao;
use Illuminate\Support\Facades\Session;

class SituacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $objSituacao;
    
    public function __construct()
    {
        $this->objSituacao=new ModelSituacao();
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function novaSituacao($codSituacao,$codPedido,$codCliente)
    {
        if (Session::get('id')>0){
            date_default_timezone_set('America/Sao_Paulo');
            
            $cad=$this->objSituacao->create([
                'id_usuario'=>Session::get('id'),
                'id_pedido'=>$codPedido,
                'dt_evento'=> date('d/m/y'),
                'hr_evento'=> date('h:i:s'),
                'tipo_evento'=>$codSituacao
            ]);
        }
        else{
            return redirect('login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelPedido;
use App\Models\ModelPedidoItem;
use App\Models\ModelCliente;
use App\Http\Controllers\SituacaoController;
use Illuminate\Support\Facades\Session;

class PedidoController extends Controller
{
    private $objPedidoItem;
    private $objPedido;
    private $objCliente;
    private $objSituacao;
    

    public function __construct()
    {
        $this->objPedidoItem=new ModelPedidoItem();
        $this->objPedido=new ModelPedido();
        $this->objCliente=new ModelCliente(); 
        $this->objSituacao=new SituacaoController();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::get('id')>0){
        $pedido=$this->objPedido->all();
        return view('indexPedido',compact('pedido'));
        }else{
            return view('login');    
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $cliente=$this->objCliente->all();
        
        return view('createPedido',compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cad=$this->objPedido->create([
            'id_cliente'=>@$request->id_cliente,
            'data'=>@$request->edt_data,
            'id_situacao'=>1
        ]);
        if($cad){            
            $this->objSituacao->novaSituacao($cad->id_situacao,$cad->id,$cad->id_cliente);
            return redirect('pedido');
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
        $pedido=$this->objPedido->find($id);
        $cliente=$this->objCliente->all();
        $pedidoItem=$this->objPedidoItem->where(['id_pedido'=>$id])->get();
        return view('createPedido',compact('pedido','cliente','pedidoItem'));
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

    }

    public function updateSituacao($id)
    {
        $pedido=$this->objPedido->find($id);
        if($pedido->id_situacao < 4){            
            $this->objPedido->where(['id'=>$id])->update([
            'id_situacao'=>$pedido->id_situacao+1,                        
            ]);
            $pedido=$this->objPedido->find($id);
            $this->objSituacao->novaSituacao($pedido->id_situacao,$pedido->id,$pedido->id_cliente);
        }
        return redirect('pedido');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelPizza;
use App\Models\ModelPedidoItem;
use App\Models\ModelPedido;
use App\Models\ModelCliente;
use App\Models\ModelAdicionalItem;
use App\Models\ModelAdicional;

class PedidoItemController extends Controller
{    
    private $objPizza;
    private $objPedidoItem;
    private $objPedido;
    private $objCliente;
    private $objAdicionalItem;
    private $objAdicional;

    public function __construct()
    {
        $this->objPizza=new ModelPizza();
        $this->objPedidoItem=new ModelPedidoItem();
        $this->objPedido=new ModelPedido();
        $this->objCliente=new ModelCliente(); 
        $this->objAdicionalItem=new ModelAdicionalItem(); 
        $this->objAdicional=new ModelAdicional(); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    { 
        $pizza=$this->objPizza->all();
        return view('createPedidoItem',compact('id','pizza'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $preco= $this->calculaPreco( @$request->id_tamanho,@$request->edt_quantidade);
         $cad=$this->objPedidoItem->create([
            'id_pizza1'=>@$request->id_pizza1,
            'id_pizza2'=>@$request->id_pizza2,
            'quantidade'=>@$request->edt_quantidade,
            'tamanho'=>@$request->id_tamanho,
            'preco'=>$preco,
            'id_pedido'=>@$request->edt_ref
        ]);
        if($cad){
            
           /*
            $pedido=$this->objPedido->find(@$request->edt_ref);
            $cliente=$this->objCliente->all();
            $pedidoItem=$this->objPedidoItem->where(['id_pedido'=>@$request->edt_ref])->get();
            return view('createPedido',compact('pedido','cliente','pedidoItem'));
            */
            $pedidoitem=$this->objPedidoItem->find($cad->id);
            $pizza=$this->objPizza->all();
            $adicionalItem=$this->objAdicionalItem->all();
            $adicional=$this->objAdicional->all();
            return view('createPedidoitem',compact('pedidoitem','pizza','adicionalItem','adicional'));

        }
    }

    public function calculaPreco($tamanho,$qtd ){      
        
        if($tamanho == 'P') $valor = 10;
        if($tamanho == 'M') $valor = 15;
        if($tamanho == 'G') $valor = 20;
        if($tamanho == 'GG') $valor = 25;
        return ($valor*$qtd);

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
        $cad=$this->objPedidoItem->find($id);
        $idPed=$cad->id_pedido;        
        $cad->delete();

        $pedido=$this->objPedido->find($idPed);
        $cliente=$this->objCliente->all();
        $pedidoItem=$this->objPedidoItem->where(['id_pedido'=>$idPed])->get();
        
        return view('createPedido',compact('pedido','cliente','pedidoItem'));
    }
}

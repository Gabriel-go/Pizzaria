<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelClienteEndereco;

class ClienteEnderecoController extends Controller
{
    private $objClienteEndereco;

    public function __construct()
    {
        $this->objClienteEndereco=new ModelClienteEndereco();
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
        return view('createClienteEndereco',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cad=$this->objClienteEndereco->create([
            'rua'=>@$request->edt_rua,
            'bairro'=>@$request->edt_bairro,
            'numero'=>@$request->edt_numero,
            'referencia'=>@$request->edt_referencia,
            'complemento'=>@$request->edt_complemento,
            'id_cliente'=>@$request->edt_cliente,
        ]);
        if($cad){
            return redirect("cliente/{$cad->id_cliente}/edit");
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
        $endereco=$this->objClienteEndereco->find($id);
        $id=$endereco->id_cliente;                
        return view('createClienteEndereco',compact('endereco','id'));
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
        $cad=$this->objClienteEndereco->where(['id'=>$id])->update([
            'rua'=>@$request->edt_rua,   
            'complemento'=>@$request->edt_complemento,   
            'referencia'=>@$request->edt_referencia,   
            'bairro'=>@$request->edt_bairro,   
            'numero'=>@$request->edt_numero,     
            'id_cliente'=>@$request->edt_cliente,       
        ]);
        if($cad){
            return redirect("cliente/{$request->edt_cliente}/edit");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cad=$this->objClienteEndereco->find($id);
        $idCli=$cad->id_cliente;        
        $cad->delete();
        return redirect("cliente/{$idCli}/edit");
    }
}

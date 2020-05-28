<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelClienteTelefone;

class ClienteTelefoneController extends Controller
{
    
    private $objClienteTelefone;
    private $este;

    public function __construct()
    {
        $this->objClienteTelefone=new ModelClienteTelefone();
        $this->este = 1;
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
        $this->este=$id;
        //$cliente=$this->objCliente->all();
        echo($this->este);
        return view('createClienteTelefone',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cad=$this->objClienteTelefone->create([
            'telefone'=>@$request->edt_telefone,
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
        $telefone=$this->objClienteTelefone->find($id);
        $id=$telefone->id_cliente;                
        return view('createClienteTelefone',compact('telefone','id'));
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
        $cad=$this->objClienteTelefone->where(['id'=>$id])->update([
            'telefone'=>@$request->edt_telefone,     
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
        $cad=$this->objClienteTelefone->find($id);
        $idCli=$cad->id_cliente;        
        $cad->delete();
        return redirect("cliente/{$idCli}/edit");
        
    }
}

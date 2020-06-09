<?php

namespace App\Http\Controllers;
use App\Models\ModelCliente;
use App\Models\ModelClienteTelefone;
use App\Models\ModelClienteEndereco;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $objCliente;
    private $objClienteTelefone;
    private $objClienteEndereco;

    public function __construct()
    {
        $this->objCliente=new ModelCliente();
        $this->objClienteTelefone=new ModelClienteTelefone();
        $this->objClienteEndereco=new ModelClienteEndereco();
    }

    public function index()
    {
        //dd($this->objFuncao->all());
        $cliente=$this->objCliente->all();
        return view('indexCliente',compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createCliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cad=$this->objCliente->create([
            'email'=>@$request->edt_email,
            'nome'=>@$request->edt_nome,
            'dt_aniversario'=>@$request->edt_aniversario
        ]);
        if($cad){
            return redirect('cliente');
        }
    }

    public function storeTelefone(Request $request)
    {
        return redirect('cliente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $cliente         =$this->objCliente->find($id);
        $clienteTel      =$this->objClienteTelefone->where('id_cliente',$id)->get();
        $clienteEndereco =$this->objClienteEndereco->where('id_cliente',$id)->get();
        return view('createCliente',compact('cliente','clienteTel','clienteEndereco'));
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
        $this->objCliente->where(['id'=>$id])->update([
            'email'=>@$request->edt_email,
            'nome'=>@$request->edt_nome,
            'dt_aniversario'=>@$request->edt_aniversario          
        ]);
        return redirect('cliente');
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

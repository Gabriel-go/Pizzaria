<?php

namespace App\Http\Controllers;

use App\Models\ModelAdicional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdicionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $objAdicional;

    public function __construct()
    {
        $this->objAdicional=new ModelAdicional();
    }

    public function index()
    {
        if (Session::get('id')>0){
            //dd($this->objFuncao->all());
            $adicional=$this->objAdicional->all();
            return view('indexAdicional',compact('adicional'));
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
        return view('createAdicional');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cad=$this->objAdicional->create([
            'descricao'=>@$request->edt_descricao,
            'preco'=>@$request->edt_preco
        ]);
        if($cad){
            return redirect('adicional');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Adicional  $adicional
     * @return \Illuminate\Http\Response
     */
    public function show(Adicional $adicional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Adicional  $adicional
     * @return \Illuminate\Http\Response
     */
    public function edit ($id)
    {
        $adicional=$this->objAdicional->find($id);
        return view('createAdicional',compact('adicional'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Adicional  $adicional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->objAdicional->where(['id'=>$id])->update([
            'descricao'=>@$request->edt_descricao,
            'preco'=>@$request->edt_preco,            
        ]);
        return redirect('adicional');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Adicional  $adicional
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $adicional=$this->objAdicional->find($id)->delete();
        return redirect('adicional');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelFuncao;
use Illuminate\Support\Facades\Session;

class FuncaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $objFuncao;

    public function __construct()
    {
        $this->objFuncao=new ModelFuncao();
    }

    public function index()
    {
        if (Session::get('id')>0){
            //dd($this->objFuncao->all());
            $func=$this->objFuncao->all();
            return view('indexFunc',compact('func'));
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
        $funcaos=$this->objFuncao->all();
        return view('createfunc');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cad=$this->objFuncao->create([
            'descricao'=>@$request->edt_descricao
        ]);
        if($cad){
            return redirect('funcao');
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

        $func=$this->objFuncao->find($id);
        return view('createFunc',compact('func'));
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
        $this->objFuncao->where(['id'=>$id])->update([
            'descricao'=>@$request->edt_descricao,
            
        ]);
        return redirect('funcao');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->objFuncao->find($id)->delete();
        return redirect('funcao');
    }
}

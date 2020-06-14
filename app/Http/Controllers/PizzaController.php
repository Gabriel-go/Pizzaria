<?php

namespace App\Http\Controllers;
use App\Models\ModelPizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    private $objPizza;

    public function __construct()
    {
        $this->objPizza=new ModelPizza();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizza=$this->objPizza->all();
        return view('indexPizza',compact('pizza'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createPizza');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $cad=$this->objPizza->create([
            'descricao'=>@$request->edt_descricao,
            'ingredientes'=>@$request->edt_ingredientes
        ]);
        if($cad){
            return redirect('pizza');
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
        $pizza=$this->objPizza->find($id);
        return view('createPizza',compact('pizza'));
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
        $this->objPizza->where(['id'=>$id])->update([
            'descricao'=>@$request->edt_descricao,
            'ingredientes'=>@$request->edt_ingredientes,            
        ]);
        return redirect('pizza');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pizza=$this->objPizza->find($id)->delete();
        return redirect('pizza');
    }
}

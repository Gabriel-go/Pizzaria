<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelFuncao;
use App\Models\ModelUsuario;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Session;

class UsuarioControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $objUsuario;
    private $objFuncao;
    private $objSession;

    public function __construct()
    {
        $this->objUsuario=new ModelUsuario();
        $this->objFuncao=new ModelFuncao();
        $this->objSession=new SessionController();
    }

    public function index()
    {

        if (Session::get('id')>0){
            //dd($this->objFuncao->find(1)->relUsuario());
            $usuario=$this->objUsuario->all();
            return view('index',compact('usuario'));
        }else{
            return view('login');    
        
        }
    }

    public function login()
    {
        return view('login');
    }

    public function logar(Request $request)
    {
        $usuario=$this->objUsuario->where([
            'email'=>@$request->edt_email,
            'senha'=>@$request->edt_senha
        ])->get();
        if(count($usuario) > 0){
            $obj=$usuario[0];
            //criando minha sessao
            $this->objSession->session($obj);
            return view('home');          
        }
        else{ 
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
        return view('create',compact('funcaos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cad=$this->objUsuario->create([
            'nome'=>@$request->edt_nome,
            'senha'=>@$request->edt_senha,
            'email'=>@$request->edt_email,
            'id_funcao'=>@$request->id_funcao,
        ]);
        if($cad){
            return redirect('usuario');
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
        $usuario=$this->objUsuario->find($id);
        return view('show',compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario=$this->objUsuario->find($id);
        $funcaos=$this->objFuncao->all();
        return view('create',compact('usuario','funcaos'));

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
        $this->objUsuario->where(['id'=>$id])->update([
            'nome'=>@$request->edt_nome,
            'senha'=>@$request->edt_senha,
            'email'=>@$request->edt_email,
            'id_funcao'=>@$request->id_funcao
        ]);
        return redirect('usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->objUsuario->delete(['id'=>$id]);
    }
}

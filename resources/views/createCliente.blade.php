@extends('templates.templates')

@section('content')

    <div class="py-5 text-center">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-6 col-10">
                    <h1>
                        @if(isset($cliente)) Editar cliente
                        @else Cadastrar cliente
                        @endif
                    </h1>
                    @if(isset($cliente)) 
                        <form method="post" name="formEdit" id="formEdit" action="{{url("cliente/$cliente->id")}}">
                        @method('PUT')
                       
                    @else 
                        <form method="post" name="formCad" id="formCad" action="{{url("cliente")}}">
                    @endif
                        @csrf
                        <div class="form-row"> 

                            <div class="form-group col-md-8">
                                <label for="form16">Nome</label>
                                <input type="text" class="form-control" id="edt_nome" name="edt_nome" placeholder="Gabriel A. F. Oliveira" value="{{$cliente->nome ?? ''}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="form16">Data Aniversario</label>
                                <input type="date" class="form-control" id="edt_aniversario" name="edt_aniversario" placeholder="" value="{{$cliente->dt_aniversario ?? ''}}">
                            </div>
                        </div>
                        <div class="form-group ">
                                <label for="form16">Email</label>
                                <input type="email" class="form-control" id="edt_email" name="edt_email" placeholder="gabriel@gmail.com" value="{{$cliente->email ?? ''}}">
                            </div>


                        <input type="submit" class="btn btn-primary" value="GRAVAR" >

                    </form>
                </div>
            </div>
        </div>
        
        
        <h2> Telefones </h2>
    <div class="col-8 m-auto text-center">
    
    <div class="text-center">
        @if(isset($cliente))
            <a href="{{url("clienteFoneCad/$cliente->id")}}">
                <button class="btn btn-success">Novo Telefone</button>
            </a>
        @endif
    </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($clienteTel)) 
                @foreach($clienteTel as $clitef)
            
                    <tr>
                        <td scope="col">{{$clitef->id}}</td>
                        <td scope="col">{{$clitef->telefone}}</td>
                        <td scope="col">
                        <a href="{{url("clienteTelefone/$clitef->id/edit")}}">
                                <button class="btn btn-primary">Editar</button>
                            </a>
                            <a href="{{url("deletarClienteTelefone/$clitef->id")}}">
                        
                                <button class="btn btn-danger">Excluir</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>

        </table>

    </div>

    <h2> Endereços </h2>
    <div class="col-8 m-auto text-center">
    <div class="text-center">
        @if(isset($cliente)) 
        <a href="{{url("clienteEnderecoCad/$cliente->id")}}">
            <button class="btn btn-success">Novo Endereço</button>
        </a> 
        @endif
    </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Rua</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($clienteTel)) 
            @foreach($clienteEndereco as $cliend)
           
                <tr>
                    <td scope="col">{{$cliend->id}}</td>
                    <td scope="col">{{$cliend->rua}}</td>
                    <td scope="col">{{$cliend->bairro}}</td>
                    <td scope="col">
                    <a href="{{url("clienteEndereco/$cliente->id/edit")}}">
                            <button class="btn btn-primary">Editar</button>
                        </a>
                        <a href="{{url("deletarClienteEndereco/$cliente->id")}}">
                       
                            <button class="btn btn-danger">Excluir</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            @endif    
            </tbody>

        </table>

    </div>

    </div>

@endsection

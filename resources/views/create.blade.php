@extends('templates.templates')

@section('content')
    <h1 class="text-center">Cadastrar Usuario</h1>


    <div class="py-5 text-center">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-6 col-10">
                    <h1>Cadastro de Funcionario</h1>
                    <form method="post" name="formCad" id="formCad" action="{{url('teste')}}">
                        @csrf
                        <div class="form-group">
                            <label for="form16">Nome</label>
                            <input type="text" class="form-control" id="edt_nome" name="edt_nome" placeholder="Gabriel A. F. Oliveira">
                        </div>
                        <div class="form-group">
                            <label for="form17">Função</label>
                            <label for="form17">Função</label>
                            <select class="form-control" name="id_funcao" id="id_funcao">
                                <option value="">Selecione</option>
                                @foreach($funcaos as $func)
                                    <option value="{{$func->id}}">{{$func->descricao}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="form18">Seu Email</label>
                            <input type="email" class="form-control" id="edt_email" name="edt_email" placeholder="gabriel@gamail.com">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="form19">Senha</label>
                                <input type="password" class="form-control" id="edt_senha" name="edt_senha" placeholder="••••">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="form20">Confirmar Senha</label>
                                <input type="password" class="form-control" placeholder="••••" id="edt_confirmar_senha" name="edt_confirmar_senha">
                            </div>

                        </div>

                        <input type="submit" class="btn btn-primary" value="GRAVAR" >

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

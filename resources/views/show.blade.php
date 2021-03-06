@extends('templates.templates')

@section('content')
    <h1 class="text-center">Show Usuario</h1>

    <div class="col-8 m-auto text-center">

        Id: {{$usuario->id}} <br>

    </div>
        <div class="py-5 text-center">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-6 col-10">
                    <h1>Cadastro de Funcionario</h1>
                    <form method="post" name="formCad" id="formCad" action="{{url('usuario')}}">
                        @csrf
                        <div class="form-group">
                            <label for="form16">Nome</label>
                            <input type="text" class="form-control" id="edt_nome" placeholder="Gabriel A. F. Oliveira" value="{{$usuario->nome}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="form18">Seu Email</label>
                            <input type="email" class="form-control" id="edt_email" placeholder="gabriel@gamail.com">
                        </div>
                      
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="form19">Senha</label>
                                <input type="password" class="form-control" id="edt_senha" placeholder="••••" value="{{$usuario->senha}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="form20">Confirmar Senha</label>
                                <input type="password" class="form-control" placeholder="••••" value="{{$usuario->senha}}" id="edt_confirmar_senha">
                            </div>

                        </div>

                        <input type="submit" class="btn btn-primary" value="GRAVAR" >

                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection

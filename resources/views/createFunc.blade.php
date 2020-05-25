@extends('templates.templates')

@section('content')

    <div class="py-5 text-center">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-6 col-10">
                    <h1>
                        @if(isset($func)) Editar Funções
                        @else Cadastrar Funções
                        @endif
                    </h1>
                    @if(isset($func)) 
                        <form method="post" name="formEdit" id="formEdit" action="{{url("funcao/$func->id")}}">
                        
                        @method('PUT')
                       
                    @else 
                        <form method="post" name="formCad" id="formCad" action="{{url('funcao')}}">
                    @endif
                        @csrf
                        <div class="form-group">
                            <label for="form16">Descriçao</label>
                            <input type="text" class="form-control" id="edt_descricao" name="edt_descricao" placeholder="Entregador" value="{{$func->descricao ?? ''}}">
                        </div>

                        <input type="submit" class="btn btn-primary" value="GRAVAR" >

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

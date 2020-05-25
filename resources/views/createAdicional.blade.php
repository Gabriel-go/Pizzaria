@extends('templates.templates')

@section('content')

    <div class="py-5 text-center">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-6 col-10">
                    <h1>
                        @if(isset($adicional)) Editar Adicional
                        @else Cadastrar Adicional
                        @endif
                    </h1>
                    @if(isset($adicional)) 
                        <form method="post" name="formEdit" id="formEdit" action="{{url("adicional/$adicional->id")}}">
                        
                        @method('PUT')
                       
                    @else 
                        <form method="post" name="formCad" id="formCad" action="{{url('adicional')}}">
                    @endif
                        @csrf
                        <div class="form-row"> 

                            <div class="form-group col-md-6">
                                <label for="form16">Descriçao</label>
                                <input type="text" class="form-control" id="edt_descricao" name="edt_descricao" placeholder="Entregador" value="{{$adicional->descricao ?? ''}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="form16">Preço</label>
                                <input type="numeric" class="form-control" id="edt_preco" name="edt_preco" placeholder="10,00" value="{{$adicional->preco ?? ''}}">
                            </div>
                        </div>


                        <input type="submit" class="btn btn-primary" value="GRAVAR" >

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

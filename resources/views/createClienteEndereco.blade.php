@extends('templates.templates')

@section('content')

    <div class="py-5 text-center">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-6 col-10">
                    <h1>
                        @if(isset($endereco)) Editar Endereço
                        @else Cadastrar Endereço
                        @endif
                    </h1>
                    @if(isset($endereco)) 
                    <form method="post" name="formEdit" id="formEdit" action="{{url("clienteEndereco/$endereco->id")}}">
                        
                        @method('PUT')
                       
                    @else 
                        <form method="post" name="formEdit" id="formEdit" action="{{url("clienteEndereco")}}">
                    @endif
                        @csrf
                        
                        <div class="form-row"> 
                            <div class="form-group col-md-1">
                                <label for="form16">Ref.</label>
                                <input type="text" class="form-control" id="edt_cliente" name="edt_cliente" value="{{$id ?? ''}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="form16">Rua</label>
                                <input type="text" class="form-control" id="edt_rua" name="edt_rua" placeholder="Rua 1" value="{{$endereco->rua ?? ''}}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="form16">Bairro</label>
                                <input type="text" class="form-control" id="edt_bairro" name="edt_bairro" placeholder="Centro" value="{{$endereco->bairro ?? ''}}">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="form16">Numero</label>
                                <input type="text" class="form-control" id="edt_numero" name="edt_numero" placeholder="S/n" value="{{$endereco->numero ?? ''}}">
                            </div>
                        </div>

                        <div class="form-row"> 
                            <div class="form-group col-md-12">
                                <label for="form16">Complemento</label>
                                <input type="text" class="form-control" id="edt_complemento" name="edt_complemento" placeholder="Qd1 Lt7" value="{{$endereco->complemento ?? ''}}">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="form16">Referencia</label>
                                <input type="text" class="form-control" id="edt_referencia" name="edt_referencia" placeholder="Ao Lado do posto" value="{{$endereco->referencia ?? ''}}">
                            </div>
                            
                        </div>

                        <input type="submit" class="btn btn-primary" value="GRAVAR" >

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

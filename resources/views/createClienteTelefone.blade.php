@extends('templates.templates')

@section('content')

    <div class="py-5 ">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-6 col-10">
                    <h1>
                        @if(isset($telefone)) Editar telefone
                        @else Cadastrar telefone
                        @endif
                    </h1>
                    @if(isset($telefone)) 
                        <form method="post" name="formEdit" id="formEdit" action="{{url("clienteTelefone/$telefone->id")}}">
                        @method('PUT')
                       
                    @else 
                        <form method="post" name="formEdit" id="formEdit" action="{{url("clienteTelefone")}}">
                    @endif
                        @csrf
                        <div class="form-row">
                        <div class="form-group col-md-2">
                                <label for="form16">Ref</label>
                                <input type="text" class="form-control" id="edt_cliente" name="edt_cliente" value="{{$id}}">
                        </div>
                        <div class="form-group col-md-8">
                                <label for="form16">Telefone</label>
                                <input type="tel" class="form-control" id="edt_telefone" name="edt_telefone" placeholder="(64)9 9999 9999" value="{{$telefone->telefone ?? ''}}">
                                </div>
                        </div>

                        <input type="submit" class="btn btn-primary" value="GRAVAR" >

                    </form>
                </div>
            </div>
        </div>
        
    </div>

@endsection

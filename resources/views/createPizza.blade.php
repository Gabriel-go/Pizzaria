@extends('templates.templates')

@section('content')

    <div class="py-5 text-center">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-6 col-10">
                    <h1>
                        @if(isset($pizza)) Editar Pizza
                        @else Cadastrar Pizza
                        @endif
                    </h1>
                    @if(isset($pizza)) 
                        <form method="post" name="formEdit" id="formEdit" action="{{url("pizza/$pizza->id")}}">
                        
                        @method('PUT')
                       
                    @else 
                        <form method="post" name="formCad" id="formCad" action="{{url('pizza')}}">
                    @endif
                        @csrf
                        <div class="form-row"> 

                            <div class="form-group col-md-12">
                                <label for="form16">Descriçao</label>
                                <input type="text" class="form-control" id="edt_descricao" name="edt_descricao" placeholder="Nome da Pizza" value="{{$pizza->descricao ?? ''}}">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="form16">Ingredientes</label>
                                <input type="text" class="form-control" id="edt_ingredientes" name="edt_ingredientes" placeholder="Nome da Pizza" value="{{$pizza->ingredientes ?? ''}}">
                            </div>
                        </div>


                        <input type="submit" class="btn btn-primary" value="GRAVAR" >

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

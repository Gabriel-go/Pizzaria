@extends('templates.templates')

@section('content')

    <div class="py-5 text-center">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-6 col-10">
                
                    <h1>
                        @if(isset($pedidoitem)) Editar Item
                        @else Cadastrar Item
                        @endif
                    </h1>
                    
                    <form method="post" name="formCad" id="formCad" action="{{url('pedidoItem')}}">
                                   
                        @csrf

                        <div class="form-row"> 
                        <div class="form-group col-md-2">
                            <label for="form16">Ref</label>
                            <input type="text" class="form-control" id="edt_ref" name="edt_ref" placeholder="1" value="{{$id ?? ''}}">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="form17">1° Metade da Pizza</label>
                            <select class="form-control" name="id_pizza1" id="id_pizza1">
                                <option value="">Selecione</option>
                                @foreach($pizza as $piz)
                                    <option value="{{$piz->id}}">{{$piz->descricao}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="form17">2° Metade da Pizza</label>
                            <select class="form-control" name="id_pizza2" id="id_pizza2">
                                <option value="">Selecione</option>
                                @foreach($pizza as $piz)
                                    <option value="{{$piz->id}}">{{$piz->descricao}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="form17">Tamanho</label>
                            <select class="form-control" name="id_tamanho" id="id_tamanho">                         
                                <option value="P">P</option>
                                <option value="M">M</option>
                                <option value="G">G</option>
                                <option value="GG">GG</option>
                            </select>
                        </div>

                            <div class="form-group col-md-5">
                                <label for="form16">Quantidade</label>
                                <input type="number" class="form-control" id="edt_quantidade" name="edt_quantidade" placeholder="QTD." value="{{$pedidoitem->quantidade ?? ''}}">
                            </div>

                        </div>
                        
                            <input type="submit" class="btn btn-primary col-md-5" value="Grava Sabor" >
                       
                        

                    </form>

                   
                    
                </div>
            </div>
        </div>
    </div>

@endsection

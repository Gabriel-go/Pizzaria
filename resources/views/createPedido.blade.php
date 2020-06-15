@extends('templates.templates')

@section('content')

<?php
    if(isset($pedido)){
        $vltotal=0;
        foreach($pedidoItem as $ped){
            $vltotal = $vltotal + $ped->preco; 
        }        
    }

?>

    <div class="py-5 text-center">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-6 col-10">
                    <h1>
                        @if(isset($pedido)) Editar Pedido
                        @else Cadastrar Pedido
                        @endif
                    </h1>
                    @if(isset($pedido)) 
                        <form method="post" name="formEdit" id="formEdit" action="{{url("pedido/$pedido->id")}}">
                        
                        @method('PUT')
                       
                    @else 
                        <form method="post" name="formCad" id="formCad" action="{{url('pedido')}}">
                    @endif
                        @csrf
                        <div class="form-row"> 
                            <div class="form-group col-md-12">
                                
                                <label for="form17">Cliente</label>
                                <select class="form-control" name="id_cliente" id="id_cliente">
                                    <option value="">Selecione o Cliente</option>                                    
                                    @foreach($cliente as $clie)
                                        <option value="{{$clie->id}}">{{$clie->nome}}</option>
                                    @endforeach                              
                                </select>

                                <label for="form17">Endereço</label>
                                <select class="form-control" name="id_cliente" id="id_cliente">
                                    <option value="">Selecione o Endereço</option>                                    
                                    <option value="2">nome Endereço</option>                                    
                                </select>
                                
                            </div>

                            <div class="form-group col-md-6">
                                <label for="form16">Data</label>
                                <input type="date" class="form-control" id="edt_data" name="edt_data" value="{{$pedido->data ?? '' }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="form16">Total</label>
                                <input type="numeric" class="form-control" id="edt_vl" name="edt_vl" placeholder="100" value="{{$vltotal ?? ''}}">
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary col-md-5" value="Gravar Cabeçalho" >

                    </form>
                    @if(isset($pedido))
                        <div class="text-center m-1">                            
                            <a href="{{url("pedidoItemNovo/$pedido->id")}}">
                                <button class="btn btn-success col-md-5">Novo Item</button>
                            </a>                            
                        </div>
                        
                        <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Detalhe</th>
                                        <th scope="col">Ação</th>
                                    </tr>
                                </thead>
                            <tbody>
                                @if(isset($pedidoItem)) 
                                    @foreach($pedidoItem as $ped)                                
                                        <tr>
                                            <td scope="col">{{$ped->id}}</td>
                                            <td scope="col">
                                                QTD: {{$ped->quantidade}} 
                                                Tam: {{$ped->tamanho}}
                                                Preço: {{$ped->preco}}
                                            </td>
                                            <td scope="col">
                                                <a href="{{url("deletarPedidoItem/$ped->id")}}">
                                            
                                                    <button class="btn btn-danger">Excluir</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>                
                        
                        <a href="{{url("pedido")}}">
                                <button class="btn btn-danger col-md-5 m-1">Fechar Pedido</button>
                        </a>
                    @endif

                </div>
                
            </div>
        </div>
    </div>

@endsection

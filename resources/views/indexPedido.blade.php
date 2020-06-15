@extends('templates.templates')

@section('content')
    <h1 class="text-center">Tela dos Pedidos</h1>
    <div class="text-center">
        <a href="{{url('pedido/create')}}">
            <button class="btn btn-success">Novo</button>
        </a>
    </div>

    <div class="col-10 m-auto text-center">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Situação</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
            @foreach($pedido as $ped)
                <tr>
                    <td scope="col">{{$ped->id}}</td>
                    <td scope="col">{{$ped->id_cliente}}</td>
                    <td scope="col"><?php  buscaSituacao($ped->id_situacao,$ped->created_at) ?></td>
                    <td scope="col">
                    <a href="{{url("pedido/$ped->id/edit")}}">
                            <button class="btn btn-dark">Visualizar</button>
                        </a>
                        <a href="{{url("novaSit/$ped->id")}}">
                            <button class="btn btn-success">Atualizar</button>
                        </a>
                        <a href="{{url("pedido/$ped->id/edit")}}">
                            <button class="btn btn-primary">Editar</button>
                        </a>
                        <a href="{{url("deletarPedido/$ped->id")}}">
                       
                            <button class="btn btn-danger">Cancelar</button>
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>

    </div>
<?php
    
    function buscaSituacao($codigo,$data){

        if($codigo == 1) $resultado = "Fila de preparação";
        if($codigo == 2) $resultado = "Em preparação";
        if($codigo == 3) $resultado = "Em trensito";
        if($codigo == 4) $resultado = "Entregue";

        $data2 = $data->format('H:i:s');
        echo $resultado;
    }

?>
@endsection

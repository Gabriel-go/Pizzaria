@extends('templates.templates')

@section('content')
    <h1 class="text-center">Crud Função</h1>
    <div class="text-center">
        <a href="{{url('adicional/create')}}">
            <button class="btn btn-success">Novo</button>
        </a>
    </div>

    <div class="col-8 m-auto text-center">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col">acao</th>
                </tr>
            </thead>
            <tbody>
            @foreach($adicional as $adc)
                <tr>
                    <td scope="col">#</td>
                    <td scope="col">{{$adc->id}}</td>
                    <td scope="col">{{$adc->descricao}}</td>
                    <td scope="col">R${{$adc->preco}}</td>
                    <td scope="col">
                        <a href="{{url("adicional/$adc->id/edit")}}">
                            <button class="btn btn-primary">Editar</button>
                        </a>
                        <a href="">
                            <button class="btn btn-danger">Excluir</button>
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>

    </div>

@endsection

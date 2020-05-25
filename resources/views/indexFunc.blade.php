@extends('templates.templates')

@section('content')
    <h1 class="text-center">Crud Função</h1>
    <div class="text-center">
        <a href="{{url('funcao/create')}}">
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
                    <th scope="col">acao</th>
                </tr>
            </thead>
            <tbody>
            @foreach($func as $funcoes)
                <tr>
                    <td scope="col">#</td>
                    <td scope="col">{{$funcoes->id}}</td>
                    <td scope="col">{{$funcoes->descricao}}</td>
                    <td scope="col">
                        <a href="{{url("funcao/$funcoes->id/edit")}}">
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

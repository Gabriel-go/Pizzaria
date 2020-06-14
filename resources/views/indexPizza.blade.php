@extends('templates.templates')

@section('content')
    <h1 class="text-center">Tela das Pizzas</h1>
    <div class="text-center">
        <a href="{{url('pizza/create')}}">
            <button class="btn btn-success">Novo</button>
        </a>
    </div>

    <div class="col-8 m-auto text-center">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Ingredientes</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
            @foreach($pizza as $p)
                <tr>
                    <td scope="col">{{$p->id}}</td>
                    <td scope="col">{{$p->descricao}}</td>
                    <td scope="col">{{$p->ingredientes}}</td>
                    <td scope="col">
                        <a href="{{url("pizza/$p->id/edit")}}">
                            <button class="btn btn-primary">Editar</button>
                        </a>
                        <a href="{{url("deletarPizza/$p->id")}}">
                       
                            <button class="btn btn-danger">Excluir</button>
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>

    </div>

@endsection

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-info bg-danger">

<div class="container">
    <a class="navbar-brand h1 mb-0" href="{{url("/")}}">Pizzaria</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
        <span class="navbar-toggler-icon"> </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSite">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{url("cliente")}}">Cad. Clientes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{url("pizza")}}">Cad. Pizzas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{url("adicional")}}">Cad. Adicionais</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link text-white" href="{{url("pedido")}}">Cad. Pedidos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{url("usuario")}}">Cad. Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{url("funcao")}}">Cad. Funções</a>
            </li>
            
        </ul>
        

    </div>
</div>
</nav>

    @yield('content')
</body>

</html>
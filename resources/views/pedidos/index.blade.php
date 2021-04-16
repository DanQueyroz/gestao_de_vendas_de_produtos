<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Gestão de Vendas</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Font Awasome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Importando CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

</head>
<body>

  <!-- Begin Page Content -->
  <div class="container-fluid px-4 mt-3">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3 p-1">
      <h1 class="h3 mb-0 text-gray-800">Gestão de Vendas</h1>
    </div>

    <!-- Alerts -->
    @include('pedidos.alerts')

    <!-- Content Row -->
    <div class="row">

      <!-- Cards -->
      @include('pedidos.cards')

      @foreach ($pedidos as $pedido)
        <div class="col col-md-12 mt-2">
          <div class="card border-left-primary shadow h-100">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col">
                  <div class="row row-cols-4 px-2">
                    <table class="table table-hover table-dark">
                      <thead>
                        <tr>
                          <th class="col text-white"><b>Pedido Nº</b> {{ $pedido->id}}</th>
                          <th class="col text-white"><b>Cliente:</b> {{ $pedido->cliente }}</th>
                          <th class="col text-white"><b>Cpf:</b> {{ $pedido->cpf }}</th>
                          <th class="col text-white"><b>E-mail</b> {{ $pedido->email }}</th>
                          <td class="text-center">
                            <form method="GET" action="pedido/delete/{{$pedido->id}}">
                              <button class="btn btn-sm btn-light mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Remover Pedido" onclick="return confirm(&quot;Deseja realmente excluir o pedido Nº {{$pedido->id}}?&quot;)"><i class="fas fa-trash text-danger"></i></button>
                            </form>
                          </td>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
           
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Produto</th>
                      <th scope="col" class="text-center">Quantidade</th>
                      <th scope="col" class="text-center">Preço Unitário</th>
                      <th scope="col" class="text-center">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($pedido['produto'] as $produto)
                      <tr>
                        <td>{{ $produto->nome }}</td>
                        <td class="text-center">{{ $produto->quantidade_comprada }}</td>
                        <td class="text-center">{{ $produto->preco }}</td>
                        <td class="text-center">{{ $produto->total }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                
              </div>
            </div>
          </div>
        </div>
      @endforeach

      <div class="">
        <button class="btn btn-success buttonFloat" type="button" data-bs-toggle="modal" data-bs-target="#addPedido"><i class="fa fa-plus" data-bs-toggle="tooltip" data-bs-placement="top" title="Criar Pedido"></i></button>
      </div>
    </div>
  </div>

  <!-- Modal -->
  @include('pedidos.modal')
    
  <!-- Bootstrap JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  <!-- Importando JS -->
  <script src="{{ asset('js/scripts.js') }}"></script>

</body>
</html>
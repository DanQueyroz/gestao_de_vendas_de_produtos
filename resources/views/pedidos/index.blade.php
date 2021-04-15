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

    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

</head>
<body>

    <!-- Begin Page Content -->
  <div class="container-fluid px-4 mt-3">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3 p-1">
      <h1 class="h3 mb-0 text-gray-800">Gestão de Vendas</h1>
    </div>

    <!-- Exibindo success -->
    @if (Session::has('success'))
      <div id="alert" class="alert alert-success alert-dismissible fade show mt-2 text-center" role="alert">
        <strong>{{ Session::get('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <!-- Exibindo errors -->
    @if (Session::has('error'))
      <div id="alert" class="alert alert-danger alert-dismissible fade show mt-2 text-center" role="alert">
        <strong>{{ Session::get('error') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <!-- Exibindo messages -->
    @if (Session::has('message'))
      <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
        <strong>{{ Session::get('message') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <!-- Content Row -->
    <div class="row">

      <!-- Card Total de Pedidos -->
      <div class="col-xl-3 col-md-6">
        <div class="card border-left-primary shadow h-100 ">
          <div class="card-body">
            <div class="row no-gutters align-items-center p-3">
              <div class="col mr-2">
                <div class="fs-5 font-weight-bold text-primary mb-1">Total de Pedidos</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pedidos_total }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Card Total de Produtos -->
      <div class="col-xl-3 col-md-6">
        <div class="card border-left-primary shadow h-100 ">
          <div class="card-body">
            <div class="row no-gutters align-items-center p-3">
              <div class="col mr-2">
                <div class="fs-5 font-weight-bold text-primary mb-1">Produtos Disponíveis</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $produtos_disponiveis }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Card Total de Pedidos Cancelados -->
      <div class="col-xl-3 col-md-6">
        <div class="card border-left-primary shadow h-100 ">
          <div class="card-body">
            <div class="row no-gutters align-items-center p-3">
              <div class="col mr-2">
                <div class="fs-5 font-weight-bold text-danger mb-1">Cancelados</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pedidos_cancelados }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-times fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Card Receita -->
      <div class="col-xl-3 col-md-6">
        <div class="card border-left-primary shadow h-100 ">
          <div class="card-body">
            <div class="row no-gutters align-items-center p-3">
              <div class="col mr-2">
                <div class="fs-5 font-weight-bold text-success mb-1">Receita</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">R$ {{ $receita }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      
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
                            <button class="btn btn-sm btn-light mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Remover Pedido"><i class="fas fa-trash text-danger"></i></button>
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
  <div class="modal fade" id="addPedido" tabindex="-1" aria-labelledby="addPedidoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content p-3">
            <div class="modal-header">
            <h5 class="modal-title" id="addPedidoLabel">Adicionar Pedido</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <div class="alert alert-primary text-center" role="alert">
                <strong>Selecione um cliente e a quantidade dos produtos .</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <form method="POST" action="{{ route('criar.pedido') }}">
                @csrf
                
                <div class="form-group mt-2 mb-4">
                    <select class="form-control-lg w-100" id="cliente" name="cliente" required>
                      <option selected value="">Selecione um Cliente</option>
                      @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                      @endforeach
                    </select>
                </div>

                @foreach ($produtos as $produto)
                  <div class="row my-4 text-center">
                    
                    <input type="hidden" name="produto_id[]" value="{{ $produto->id }}" class="form-control text-center" required>
                    
                    <div class="col">
                      <label for="">Produto</label>
                      <input type="text" name="produto[]" value="{{ $produto->nome }}" class="form-control text-center" required readonly>
                    </div>
                    <div class="col">
                      <label for="">Valor Unitário</label>
                      <input type="text" name="valor[]" value="{{ $produto->preco }}" class="form-control text-center"required readonly>
                    </div>
                    <div class="col">
                      <label for="">Disponíveis</label>
                      <input type="text" name="disponiveis[]" value="{{$produto->disponiveis}}" class="form-control text-center" required readonly>
                    </div>
                    <div class="col">
                      <label for="">Quantidade</label>
                      <input type="number" name="quantidade[]" value="" class="form-control text-center" min="0" max="{{ $produto->disponiveis }}" placeholder="0" >
                    </div>
                  </div>
                @endforeach

                <div class="d-grid mt-4">
                  <button class="btn btn-primary" type="submit">Gerar Pedido</button>
                </div>
              </form>
    
            </div>
        </div>
    </div>
  </div>
    
  <!-- Bootstrap JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  <script src="{{ asset('js/scripts.js') }}"></script>

</body>
</html>
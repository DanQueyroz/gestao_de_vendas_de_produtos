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
      <div id="alert" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        <strong>{{ Session::get('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    <!-- Exibindo errors -->
    @if (Session::has('error_valor_minimo'))
      <div id="alert" class="alert alert-warning alert-dismissible fade show mt-2 text-center" role="alert">
        <strong>{{ Session::get('error_valor_minimo') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
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
                <div class="h5 mb-0 font-weight-bold text-gray-800">30</div>
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
                <div class="fs-5 font-weight-bold text-primary mb-1">Total de Produtos</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">30</div>
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
                <div class="h5 mb-0 font-weight-bold text-gray-800">30</div>
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
                <div class="h5 mb-0 font-weight-bold text-gray-800">R$ 300,00</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-2">
        <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#addPedido"><i class="fa fa-plus" data-bs-toggle="tooltip" data-bs-placement="top" title="Criar Novo Pedido"></i> Criar Novo Pedido</button>
      </div>
      
      <div class="col col-md-12 mt-1">
        <div class="card border-left-primary shadow h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col">
                    <div class="row row-cols-4 px-2">
                      <table class="table table-hover table-dark">
                        <thead>
                          <tr>
                            <th class="col text-white"><b>Pedido Nº</b> 1518</th>
                            <th class="col text-white"><b>Cliente:</b> Osmar Santos Jr</th>
                            <th class="col text-white"><b>Cpf:</b> 025.985.848-30</th>
                            <th class="col text-white"><b>E-mail</b> osmar#teste.com</th>
                            <td class="text-center">
                              <button class="btn btn-sm btn-light mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar Pedido"><i class="fas fa-pencil-alt"></i></button>
                              <button class="btn btn-sm btn-light mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Remover Pedido"><i class="fas fa-trash text-danger"></i></button>
                            </td>
                          </tr>
                        </thead>
                      </table>
                    </div>
                </div>
              </div>
              
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Produto</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Preço</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td >Larry the Bird</td>
                    <td>Thornton</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

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
              <form>
               
                <div class="form-group mt-2 mb-4">
                    <select class="form-control w-100" id="cliente" name="cliente" required>
                      <option selected value="">Selecione um Cliente</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                </div>

                <div class="row my-2 text-center">
                  <div class="col">
                    <label for="">Produto</label>
                    <input type="text" name="produto" value="" class="form-control text-center" placeholder="Caneta" required disabled>
                  </div>
                  <div class="col">
                    <label for="">Valor Unitário</label>
                    <input type="text" name="valor" value="" class="form-control text-center" placeholder="R$ 1,99" required disabled>
                  </div>
                  <div class="col">
                    <label for="">Disponíveis</label>
                    <input type="text" name="disponiveis" value="" class="form-control text-center" placeholder="350" required disabled>
                  </div>
                  <div class="col">
                    <label for="">Quantidade</label>
                    <input type="number" name="quantidade" value="" class="form-control text-center" min="0" max="2" placeholder="0" value="" required>
                  </div>
                </div>

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
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
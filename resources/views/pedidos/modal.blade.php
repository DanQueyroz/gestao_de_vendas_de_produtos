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
                  <button class="btn btn-lg btn-primary" type="submit">Gerar Pedido</button>
                </div>
            </form>

        </div>
    </div>
</div>
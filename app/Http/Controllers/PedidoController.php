<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Pedido;
use App\Models\Pedido_Produto;

class PedidoController extends Controller
{
    public function index()
    {
        // Listando todos os clientes cadastrados
        $clientes = Cliente::all();

        // Listando todos os produtos cadastrados
        $produtos = Produto::all();

        $produtos_disponiveis = Produto::all()->sum('disponiveis');
        $pedidos_total = Pedido::where('status', true)->count();
        $pedidos_cancelados = Pedido::where('status', false)->count();
        $receita = 0;

        //Formatando valores para exibição
        foreach ($produtos as $produto) {
            $produto->preco = 'R$ '. number_format($produto->preco, 2, ',', '.');  ;
        }

        // Buscando todos os pedidos ativos no sistema
        $pedidos = Pedido::where('status', true)->select('id', 'cliente_id')->get();

        
        foreach ($pedidos as $pedido) {
            $cliente = Cliente::where('id', $pedido->cliente_id)->select('nome', 'cpf', 'email')->first();

            // Adicionando mascara ao cpf
            $cpf1 = substr($cliente->cpf, 0, 3);
            $cpf2 = substr($cliente->cpf, 3, 3);
            $cpf3 = substr($cliente->cpf, 6, 3);
            $cpf4 = substr($cliente->cpf, 9, 2);
            $cpf = $cpf1.'.'. $cpf2.'.'.$cpf3.'-'.$cpf4;
    
            $pedido->cliente = $cliente->nome;
            $pedido->cpf = $cpf;
            $pedido->email = $cliente->email;

            // buscando os produtos nos pedidos 
            $pedido_produtos = Pedido_Produto::where('pedido_id', $pedido->id)->get();
            
            $lista_produtos = [];
            foreach ($pedido_produtos as $pedido_produto) {
                $produto = Produto::find($pedido_produto->produto_id);

                $total = 0;
                $total += $pedido_produto->quantidade * $produto->preco;

                $produto->preco = 'R$ '. number_format($produto->preco, 2, ',', '.');  
                $produto->quantidade_comprada = $pedido_produto->quantidade;
                $produto->total = 'R$ '. number_format($total, 2, ',', '.');

                array_push($lista_produtos, $produto);
                $receita += $total;
            }
            $pedido->produto = $lista_produtos;
        }
        $receita = number_format($receita, 2, ',', '.');
        
        return view('pedidos.index', compact(
            'clientes', 
            'produtos', 
            'pedidos', 
            'produtos_disponiveis', 
            'pedidos_total', 
            'pedidos_cancelados', 
            'receita'
        ));
    }

    public function create(Request $request)
    { 
        //Criando regras de validação
        $validator = Validator::make($request->all(), [
            'cliente' => 'required|numeric',
            'produto'    => 'required',
            'valor' => 'required',
            'disponiveis' => 'required',
            'quantidade' => 'min:0',
        ]);

        //Se o validator encontrar erros ele retornará uma resposta json e uma maensagem com os erros encontrados
        if($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()], 
                400);
        }

        // Verificando se o ID passado corresponde a um cliente cadastrado 
        $cliente_id = Cliente::find($request->cliente)->id;
        if (!$cliente_id) {
            return redirect()->back()->with('error', 'Desculpe, cliente não encontrado.');
        }

        // Verificando se ao menos uma unidade foi adicionada ao pedido
        $check_quantidade = 0;
        foreach ($request->quantidade as $qtd) {
            $check_quantidade += $qtd;
        }
        if ($check_quantidade < 1) {
            return redirect()->back()->with('message', 'Selecione a quantidade dos produtos para efetuar o pedido.');
        }

        try {

            // Registrando apenas os produtos onde o campo quantidade é maior que zero
            $pedido_produtos = [];
            foreach ($request->quantidade as $key => $value) {
                if ($value > 0) {

                    // Verificando se a quantidade solicitada excede a disponível em estoque
                    $disponiveis = $request->disponiveis[$key];
                    $quantidade = $request->quantidade[$key];
                    $produto_nome = $request->produto[$key];

                    if ($quantidade > $disponiveis) {
                        return redirect()->back()->with('error', 'A quantidade de '.$produto_nome.' solicitado(a) é maior que a disponível em estoque');
                    }

                    // Recuperando ID do produto e subtraindo a quantidade em estoque
                    $produto = Produto::find($request->produto_id[$key]);
                    $produto->disponiveis -= $quantidade;
                    $produto->update();

                    array_push($pedido_produtos, [
                        'produto_id' => $produto->id,
                        'quantidade' => $quantidade
                    ]);
                }
            }

            // Os pedidos só serão gerados caso ao menos 1 produto seja enviado
            if ($pedido_produtos) {

                // Criando o pedido e inserindo os produtos
                $pedido = new Pedido;
                $pedido->cliente_id = $cliente_id;
                $pedido->save();

                foreach ($pedido_produtos as $key => $item) {
                    $pedido_produto = new Pedido_Produto;
                    $pedido_produto->pedido_id = $pedido->id;
                    $pedido_produto->produto_id = $item['produto_id'];
                    $pedido_produto->quantidade = $item['quantidade'];
                    $pedido_produto->save();
                }
            }
            return redirect()->back()->with('success', 'Pedido incluído com sucesso!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Desculpe, ocorreu um erro de comunicação com o servidor.');
        }
    }

    public function delete($id)
    {
        try {
            
            // Recuperando pedido pelo ID e verificando se o mesmo existe
            $pedido = Pedido::find($id);
            if (!$pedido) {
                return redirect()->back()->with('error', 'Desculpe, pedido não encontrado.');
            }

            // Efetuando exclusão lógica do pedido
            $pedido->status = false;
            $pedido->update();

            return redirect()->back()->with('success', 'Pedido removido com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Desculpe, ocorreu um erro de comunicação com o servidor.');
        } 
    }
}

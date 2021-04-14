<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produto::create([
            'id'            => 1,
            'nome'          => 'Caderno',
            'preco'         => 13.99,
            'quantidade'    => 350,
            'disponiveis'   => 350
        ]);

        Produto::create([
            'id'            => 2,
            'nome'          => 'Mochila',
            'preco'         => 49,
            'quantidade'    => 250,
            'disponiveis'   => 250
        ]);

        Produto::create([
            'id'            => 3,
            'nome'          => 'Lancheira',
            'preco'         => 19.99,
            'quantidade'    => 250,
            'disponiveis'   => 250
        ]);

        Produto::create([
            'id'            => 4,
            'nome'          => 'Lápis',
            'preco'         => 1.50,
            'quantidade'    => 500,
            'disponiveis'   => 500
        ]);

        Produto::create([
            'id'            => 5,
            'nome'          => 'Borracha',
            'preco'         => 0.50,
            'quantidade'    => 400,
            'disponiveis'   => 400
        ]);

        Produto::create([
            'id'            => 6,
            'nome'          => 'Caneta',
            'preco'         => 2.00,
            'quantidade'    => 600,
            'disponiveis'   => 600
        ]);
    }
}

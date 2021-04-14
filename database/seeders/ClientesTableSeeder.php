<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'id'        => 1,
            'nome'      => 'Carlos Ferreira',
            'email'     => 'carlos@teste.com.br',
            'cpf'       => '06977281537'
        ]);

        Cliente::create([
            'id'        => 2,
            'nome'      => 'Erick Santiago',
            'email'     => 'erick@teste.com.br',
            'cpf'       => '27318205005'
        ]);

        Cliente::create([
            'id'        => 3,
            'nome'      => 'Edna Soares',
            'email'     => 'edna@teste.com.br',
            'cpf'       => '88294789038'
        ]);

        Cliente::create([
            'id'        => 4,
            'nome'      => 'Elielton Santos',
            'email'     => 'eli@teste.com.br',
            'cpf'       => '55565689015'
        ]);

        Cliente::create([
            'id'        => 5,
            'nome'      => 'Sandra Albuquerque',
            'email'     => 'sandra@teste.com.br',
            'cpf'       => '45658381509'
        ]);
    }
}

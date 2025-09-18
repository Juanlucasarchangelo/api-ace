<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'id' => 1,
            'nome' => 'Juan Lucas Alves',
            'sobrenome' => 'Archangelo',
            'email' => 'jlarchangelo@outlook.com',
            'cpf_cnpj' => '45691644807',
            'telefone' => '19987720695',
            'endereco' => 'Jose Timoteo da Silva',
            'cidade' => 'Osasco',
            'bairro' => 'São Pedro',
            'numero' => '394',
            'complemento' => 'Apto 108, Torre B',
            'cep' => '06172220',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Endereco;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Endereco::create([
            'id' => 1,
            'endereco' => 'Jose Timoteo da Silva',
            'cidade' => 'Osasco',
            'bairro' => 'São Pedro',
            'numero' => '394',
            'complemento' => 'Torre B, Apto 108',
            'cep' => '06172220'
        ]);
    }
}

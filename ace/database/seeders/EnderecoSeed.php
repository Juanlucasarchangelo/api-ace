<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnderecoSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('enderecos')->insert([
            'endereco' => 'José Timoteo da Silva',
            'cidade' => 'Osasco',
            'bairro' => 'São Pedro',
            'numero' => '394',
            'complemento' => '',
            'cep' => '06172220'
        ]);
    }
}

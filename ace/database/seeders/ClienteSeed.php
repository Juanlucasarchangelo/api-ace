<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ClienteSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            'nome' => 'Juan Lucas',
            'sobrenome' => 'Archangelo',
            'email' => 'jlarchangelo@outlook.com',
            'cpf_cnpj' => '45691644807',
            'telefone' => '45691644807',
            'enderecos_id' => '1',
        ]);
    }
}

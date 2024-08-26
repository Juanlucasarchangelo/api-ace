<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResumoSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('resumos')->insert([
            'briefing' => 'Apenas um teste de briefing, um cliente que quer um site que faça tudo que ele precisa sem precisar pagar caro para isso.',
            'data_entrega' => '12-12-2024'
        ]);
    }
}

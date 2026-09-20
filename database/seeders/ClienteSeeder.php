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
        for ($i = 1; $i <= 10; $i++) {
            Cliente::create([
                'nome' => fake()->firstName(),
                'sobrenome' => fake()->lastName(),
                'email' => fake()->unique()->safeEmail(),
                'cpf_cnpj' => fake()->unique()->numerify('###########'),
                'telefone' => fake()->numerify('119########'),
                'endereco' => fake()->streetName(),
                'cidade' => fake()->city(),
                'bairro' => fake()->citySuffix(),
                'numero' => fake()->buildingNumber(),
                'complemento' => fake()->optional()->secondaryAddress(),
                'cep' => fake()->postcode(),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Site::create([
                'cliente_id' => 1,
                'resumo' => fake()->sentence(),
                'dominio' => fake()->unique()->domainName(),
            ]);
        }
    }
}

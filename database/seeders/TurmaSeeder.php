<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TurmaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 5) as $i) {
            DB::table('turmas')->insert([
                'id' => $i,
                'nome' => "Turma $i",
                'curso_id' => $i,
                'ano' => 2024,
            ]);
        }
    }
}

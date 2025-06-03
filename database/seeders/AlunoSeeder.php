<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 12) as $i) {
            DB::table('alunos')->insert([
                'nome' => "Aluno $i",
                'cpf' => str_pad("12345678$i", 11, "0", STR_PAD_LEFT),
                'email' => "aluno$i@example.com",
                'senha' => bcrypt("senha$i"),
                'user_id' => null,
                'curso_id' => $i,
                'turma_id' => ($i % 5) + 1,
            ]);
        }
    }
}

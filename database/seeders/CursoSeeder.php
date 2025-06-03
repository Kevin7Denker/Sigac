<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cursos')->insert([
            ['id' => 1, 'nome' => 'TÉCNICO EM INFORMÁTICA', 'sigla' => 'INFO', 'total_horas' => 3600, 'nivel_id' => 1, 'eixo_id' => 1],
            ['id' => 2, 'nome' => 'TECNÓLOGO EM ANÁLISE E DESENVOLVIMENTO DE SISTEMAS', 'sigla' => 'TADS', 'total_horas' => 2400, 'nivel_id' => 2, 'eixo_id' => 1],
            ['id' => 3, 'nome' => 'TÉCNICO EM ENFERMAGEM', 'sigla' => 'ENF', 'total_horas' => 4000, 'nivel_id' => 1, 'eixo_id' => 2],
            ['id' => 4, 'nome' => 'TECNÓLOGO EM GESTÃO HOSPITALAR', 'sigla' => 'TGH', 'total_horas' => 2400, 'nivel_id' => 2, 'eixo_id' => 2],
            ['id' => 5, 'nome' => 'TÉCNICO EM MECÂNICA', 'sigla' => 'MEC', 'total_horas' => 3600, 'nivel_id' => 1, 'eixo_id' => 3],
            ['id' => 6, 'nome' => 'TECNÓLOGO EM ENGENHARIA MECÂNICA', 'sigla' => 'TEM', 'total_horas' => 2400, 'nivel_id' => 2, 'eixo_id' => 3],
            ['id' => 7, 'nome' => 'TÉCNICO EM ADMINISTRAÇÃO', 'sigla' => 'ADM', 'total_horas' => 3200, 'nivel_id' => 1, 'eixo_id' => 4],
            ['id' => 8, 'nome' => 'TECNÓLOGO EM GESTÃO FINANCEIRA', 'sigla' => 'TGF', 'total_horas' => 2400, 'nivel_id' => 2, 'eixo_id' => 4],
            ['id' => 9, 'nome' => 'TÉCNICO EM ELETROTÉCNICA', 'sigla' => 'ELE', 'total_horas' => 3600, 'nivel_id' => 1, 'eixo_id' => 5],
            ['id' => 10, 'nome' => 'TECNÓLOGO EM REDES DE COMPUTADORES', 'sigla' => 'TRC', 'total_horas' => 2400, 'nivel_id' => 2, 'eixo_id' => 1],
            ['id' => 11, 'nome' => 'TÉCNICO EM MEIO AMBIENTE', 'sigla' => 'MA', 'total_horas' => 3000, 'nivel_id' => 1, 'eixo_id' => 6],
            ['id' => 12, 'nome' => 'TECNÓLOGO EM GESTÃO AMBIENTAL', 'sigla' => 'TGA', 'total_horas' => 2400, 'nivel_id' => 2, 'eixo_id' => 6],
        ]);
    }
}

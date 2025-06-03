<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EixoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          DB::table('eixos')->insert([
            ['id' => 1, 'nome' => 'Informática'],
            ['id' => 2, 'nome' => 'Saúde'],
            ['id' => 3, 'nome' => 'Indústria'],
            ['id' => 4, 'nome' => 'Gestão'],
            ['id' => 5, 'nome' => 'Energia'],
            ['id' => 6, 'nome' => 'Ambiente'],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('niveis')->insert([
            ['id' => 1, 'nome' => 'Técnico'],
            ['id' => 2, 'nome' => 'Tecnólogo'],
        ]);
    }
}

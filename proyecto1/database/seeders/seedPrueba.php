<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class seedPrueba extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('post')->insert([
            'id' => '1',
            'title' => 'titulo 2',
            'decription' => 'descripcion2',
            'completed' => 'si',
        ]);
    }
}

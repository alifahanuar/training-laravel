<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->truncate(); //truncate akan clear kan kita punya data
        DB::table('items')->insert([
            'title' => 'Komputer',
            'details' => 'Komputer Riba Jenama Lenovo',
            'user_id' => 1
        ]);
        DB::table('items')->insert([
            'title' => 'Meja',
            'details' => 'Meja di Bilik F',
            'user_id' => 1
        ]);
        DB::table('items')->insert([
            'title' => 'Kerusi',
            'details' => 'Kerusi di Dewan Serbaguna',
            'user_id' => 1
        ]);
    }
}

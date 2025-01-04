<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class pelajarseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pelajar')->insert(
            [
                [
                    'nama' => 'Bagas', 
                    'pengajar_id' => 1, 
                    'jurusan_id' => 1
                ],
                [
                    'nama' => 'Alan', 
                    'pengajar_id' => 2, 
                    'jurusan_id' => 2
                ],
                [
                    'nama' => 'Bangsyad', 
                    'pengajar_id' => 3, 
                    'jurusan_id' => 3
                ],
                [
                    'nama' => 'Harb', 
                    'pengajar_id' => 4, 
                    'jurusan_id' => 4
                ],
            ]);
    }
}

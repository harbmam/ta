<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class jurusanseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jurusan')->insert(
            [
                [
                    'nama' => 'Bahasa Arab'
                ],
                [
                    'nama' => 'Bahasa Inggris'
                ],
                [
                    'nama' => 'Bahasa Jepang'
                ],
                [
                    'nama' => 'Bahasa Russia'
                ],
            ]);
    }
}

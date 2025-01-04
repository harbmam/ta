<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class pengajarseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengajar')->insert(
            [
                [
                    'nama' => 'Usro', 
                    'email' => 'usr@gmail.com', 
                    'hp' => '0821-'. rand(),
                    'alamat' => 'Jakarta', 
                    'id_jurusan' => 1
                ],
                [
                    'nama' => 'Budi', 
                    'email' => 'bdi@gmail.com', 
                    'hp' => '0821-'. rand(),
                    'alamat' => 'Surabaya', 
                    'id_jurusan' => 2
                ],
                [
                    'nama' => 'Ucok', 
                    'email' => 'uck@gmail.com', 
                    'hp' => '0821-'. rand(),
                    'alamat' => 'Madura', 
                    'id_jurusan' => 3
                ],
                [
                    'nama' => 'Abdul', 
                    'email' => 'abd@gmail.com', 
                    'hp' => '0821-'. rand(),
                    'alamat' => 'Bandung', 
                    'id_jurusan' => 4
                ],
            ]);
    }
}

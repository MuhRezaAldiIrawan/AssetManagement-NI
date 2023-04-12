<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
            
                [
                    'id' => '1',
                    'nama' => 'Kerusakan Mayor'
                ],
                [
                    'id' => '2',
                    'nama' => 'Kerusakan Minor'
                ],
                [
                    'id' => '3',
                    'nama' => 'Kerusakan/Pergantian'
                ],
                [
                    'id' => '4',
                    'nama' => 'Pemasangan Baru'
                ],
                [
                    'id' => '5',
                    'nama' => 'Penambahan Tinta'
                ],
                [
                    'id' => '6',
                    'nama' => 'Perawatan Rutin'
                ],
                [
                    'id' => '7',
                    'nama' => 'Perbaikan'
                ],
                [
                    'id' => '8',
                    'nama' => 'Remote Dekstop/LC'
                ],
                [
                    'id' => '9',
                    'nama' => 'Install Aplikasi '
                ]
        ];
        Kategori::insert($kategori);
    }
}

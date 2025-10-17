<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('barangs')->insert([
            'foto'        => 'nophoto.jpg',
            'nama_barang' => 'Rok',
            'harga'       => 1000000,   
            'stok'        => 100,
            'satuan'      => 1,
            'warna'        => 'merah',
        ]);
    }
}

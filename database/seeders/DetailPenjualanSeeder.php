<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetailPenjualan; 

class DetailPenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetailPenjualan::create([
            'id_penjualan' => 1,
            'id_barang' => 1,
            'jumlah' => 50,
        ]);
    }
}

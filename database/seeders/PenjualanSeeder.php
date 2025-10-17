<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penjualan;

class PenjualanSeeder extends Seeder
{
    public function run()
    {
        Penjualan::create([
            'tgl_penjualan' => now(),
            'diskon' => 10,
            'total' => 50000,
            'harga' => 55000,
            'id_admin' => 1, 
        ]);
    }
}

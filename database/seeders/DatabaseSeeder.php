<?php

namespace Database\Seeders;
use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\Admin;
use App\Models\DetailPenjualan;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PenjualanSeeder::class);
        $this->call(BarangSeeder::class);
         $this->call(AdminSeeder::class);
         $this->call(DetailPenjualanSeeder::class);
    }
        
    
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin; 

class AdminSeeder extends Seeder
{
 
    public function run(): void
    {
        Admin::firstOrCreate(
            ['username' => 'sityy'], 
            [
                'nama_admin' => 'Siti',
                'password' => bcrypt('221207'),
                'no_telp' => '08995809779',
            ]
        );
    }
}

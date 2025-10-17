<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'foto',
        'nama_barang',
        'harga',
        'stok',
        'satuan',
        'warna',
     ];
        public function detail_penjualan()
    {
        return $this->hasMany(DetailPenjualan::class, 'id_barang');
    }

}

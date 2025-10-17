<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_penjualan',
        'diskon',
        'total',
        'harga',
        'id_admin',
        
    ];
                public function detail_penjualan()
            {
                return $this->hasMany(DetailPenjualan::class, 'id_penjualan');
            }
              public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }
}

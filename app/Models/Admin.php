<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama_admin',
        'username',
        'password',
        'no_telp',
    ];

    // kalau kamu gak pakai "remember_token", tambahkan ini
    public $timestamps = true;

    protected $hidden = [
        'password',
    ];
        public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'id_admin');
    }
}

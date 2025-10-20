<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SewaLoker extends Model
{

    protected $fillable = [
        'loker_id',
        'user_id',
        'tanggal_mulai',
        'tanggal_akhir',
        'harga_per_hari',
        'harga_per_hari_denda',
        'total_harga',
        'status_sewa',
        'kombinasi_password',
        'keterangan_loker',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function loker()
    {
        return $this->belongsTo(Loker::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}

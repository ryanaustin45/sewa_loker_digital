<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        'sewa_loker_id',
        'tanggal_bayar',
        'metode_bayar',
        'status',
        'total_bayar',
    ];

    public function sewaLoker()
    {
        return $this->belongsTo(SewaLoker::class);
    }
}

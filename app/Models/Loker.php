<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    protected $fillable = [
        'kode_loker',
        'lokasi',
        'harga_per_hari',
        'status',
        'ukuran',
    ];

    public function sewaLoker()
    {
        return $this->hasMany(SewaLoker::class);
    }
}

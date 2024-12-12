<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Mobil extends Model
{
    // protected $guarded = ['id'];

    protected $fillable = [
        'merek',
        'nomor_polisi',
        'warna',
        'transmisi',
        'kapasitas',
        'harga',
        'image_url'
    ];

    protected function imageUrl()
    {
        return Attribute::make(
            get: fn($value) => url('storage/mobils' . $value),
        );
    }
}

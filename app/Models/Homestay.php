<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homestay extends Model
{
    use HasFactory;

    protected $table = "homestays";
    protected $fillable = [
        'nama_homestay',
        'jenis_homestay',
        'harga',
        'gambar',
        'desc_homestay'
    ];

    public function fasilitas()
    {
        return $this->hasMany(Fasilitas::class, 'homestay_id', 'id_homestay');
    }

    public function gambar()
    {
        return $this->belongsTo(GambarHomestay::class, 'homestay_id', 'id_homestay');
    }

    public function perlengkapan()
    {
        return $this->belongsTo(Perlengkapan::class, 'homestay_id', 'id_homestay');
    }
}

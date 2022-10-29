<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perlengkapan extends Model
{
    use HasFactory;

    protected $table = "perlengkapans";
    protected $fillable = [
        'homestay_id',
        'nama_perlengkapan',
        'jumlah_perlengkapan',
        'tempat',
        'desc_perlengkapan',
        'gambar'
    ];

    public function homestay()
    {
        return $this->belongsTo(Homestay::class, 'homestay_id', 'id_homestay');
    }
}

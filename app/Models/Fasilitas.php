<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = "fasilitas";
    protected $fillable = [
        'homestay_id',
        'nama_fasilitas',
        'jumlah_fasilitas',
        'desc_fasilitas',
        'gambar'
    ];

    public function homestay()
    {
        return $this->belongsTo(Homestay::class, 'homestay_id', 'id_homestay');
    }
}

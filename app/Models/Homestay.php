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
}

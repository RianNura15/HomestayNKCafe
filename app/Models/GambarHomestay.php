<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarHomestay extends Model
{
    use HasFactory;

    protected $table = "gambar_homestays";
    protected $fillable = [
        'homestay_id',
        'filename'
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSewa extends Model
{
    use HasFactory;

    protected $table = "data_sewas";
    protected $fillable = [
        'user_id',
        'homestay_id',
        'expired',
        'tanggal_sewa',
        'tanggal_mulai',
        'tanggal_selesai',
        'totalhari',
        'keterangan',
        'konfirmasi',
        'total',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function homestay()
    {
        return $this->belongsTo(Homestay::class, 'homestay_id', 'id_homestay');
    }
}

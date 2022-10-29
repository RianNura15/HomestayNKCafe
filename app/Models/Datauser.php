<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datauser extends Model
{
    use HasFactory;

    protected $table = 'datausers';
    protected $fillable = [
        'user_id',
        'no_telp',
        'jenis_kelamin',
        'ktp',
        'gambar_ktp',
        'alamat_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

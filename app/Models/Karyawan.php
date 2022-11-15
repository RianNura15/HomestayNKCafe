<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table="karyawans";
    protected $guarded=['id_karyawan'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->join('datausers','datausers.user_id','=','users.id');
    }
}

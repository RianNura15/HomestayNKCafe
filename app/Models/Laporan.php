<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table="laporans";
    protected $guarded=['id_laporan'];

    public function data_sewa()
    {
        return $this->belongsTo(DataSewa::class, 'sewa_id', 'id_sewa')->join('users','users.id','=','data_sewas.user_id')->join('homestays','homestays.id_homestay','=','data_sewas.homestay_id');
    }
}

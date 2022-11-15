<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSewa extends Model
{
    use HasFactory;

    protected $table = "data_sewas";
    protected $guarded = ['id_sewa'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->join('datausers','datausers.user_id','=','users.id');
    }

    public function homestay()
    {
        return $this->belongsTo(Homestay::class, 'homestay_id', 'id_homestay');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id', 'id_bank');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'pesanan';
    public $timestamps = false;

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    public function pesananDetail()
    {
        return $this->hasMany(PesananDetail::class, 'pesanan_id', 'id');
    }

    public function konfirmasiPesanan()
    {
        return $this->hasOne(KonfirmasiPesanan::class, 'pesanan_id', 'id');
    }
}

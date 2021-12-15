<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonfirmasiPesanan extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'konfirmasi_pesanan';
    public $timestamps = false;
}

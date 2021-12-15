<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $guarded = [];
    public $timestamps = false;

    public function pesananDetail()
    {
        return $this->hasMany(PesananDetail::class, 'id' ,'produk_id');
    }

    public function keranjang()
    {
        return $this->hasOne(Keranjang::class, 'id', 'produk_id');
    }
}

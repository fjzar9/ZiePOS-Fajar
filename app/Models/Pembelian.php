<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelian';

    protected $fillable = ['kode_masuk', 'tanggal_masuk', 'total', 'pemasok_id', 'user_id'];
    
    protected $dates = ['tanggal_masuk'];

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detail_pembelian()
    {
        return $this->belongsTo(DetailPembelian::class);
    }
}

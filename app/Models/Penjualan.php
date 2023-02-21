<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';

    protected $fillable = ['no_faktur', 'tgl_faktur', 'total_bayar', 'pelanggan_id', 'user_id'];

    protected $dates = ['tgl_faktur'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detail_penjualan()
    {
        return $this->belongsTo(DetailPenjualan::class);
    }
}

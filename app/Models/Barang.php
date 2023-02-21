<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = ['kode_barang', 'produk_id', 'nama_barang', 'satuan_id', 'harga_jual', 'stok', 'ditarik', 'user_id'];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function detail_pembelian()
    {
        return $this->hasMany(DetailPePelmbelian::class);
    }

    public function detail_penjualan()
    {
        return $this->hasMany(DetailPenjualan::class);
    }

}

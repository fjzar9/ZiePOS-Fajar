<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    use HasFactory;

    protected $table = 'pemasok';

    protected $fillable = ['nama_pemasok', 'alamat', 'no_telp', 'salesman', 'bank_id', 'no_rek'];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function pemasok()
    {
        return $this->hasMany(Pembelian::class);
    }
}

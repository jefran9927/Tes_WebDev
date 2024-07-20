<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nama_Barang',
        'Jumlah_Terjual',
        'Tanggal_Transaksi',
        'Jenis_Barang',
        'Stok'
    ];
}

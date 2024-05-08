<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;
    protected $table = 'keuangan';
    protected $primarykey = "id";
    protected $fillable = [
        'id',
        'tanggal_pembayaran',
        'nomor_bukti',
        'nama',
        'berita_pembayaran',
        'status_pembayaran',
        'jumlah_uang',
        'petugas',
    ];
}

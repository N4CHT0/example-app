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
        'periode_pembayaran',
        'nomor_bukti',
        'nomor_tagihan',
        'id_user',
        'berita_pembayaran',
        'status_pembayaran',
        'jumlah_uang',
        'total_tagihan',
        'petugas',
        'data_pembayaran',
        'keterangan',
    ];
    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

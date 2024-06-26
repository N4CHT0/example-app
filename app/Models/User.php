<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'id_absensi',
        'nama_lengkap',
        'alamat',
        'agama',
        'email',
        'password',
        'jenis_akun',
        'jenis_diklat',
        'status_akun',
        'status_transaksi',
        'layanan_tambahan',
        'bukti_pembayaran',
        'pendaftaran',
        'peserta_ujian',
        'tanggal_lahir',
        'tempat_lahir',
        'no_telp',
        'foto',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $keyType = 'string';
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function PesertaUjian()
    {
        return $this->hasMany(PesertaUjian::class, 'id_user');
    }

    public function Keuangan()
    {
        return $this->hasMany(Keuangan::class, 'id_user');
    }

    public function AbsensiPeserta()
    {
        return $this->belongsTo(PesertaUjian::class, 'id_absensi');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DaftarCOP extends Model
{
    use HasFactory;
    protected $table = 'daftar_cop';
    protected $primarykey = "id";
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'seafare_code',
        'nama_lengkap',
        'jenis_kelamin',
        'jenis_sertifikat_cop',
        'agama',
        'pekerjaan',
        'tempat_lahir',
        'tanggal_lahir',
        'no_telp',
        'alamat',
        'provinsi',
        'kabupaten_kota',
        'kelurahan_desa',
        'kecamatan',
        'rt_rw',
        'kode_pos',
        'status',
        'nama_ibu',
        'nama_ayah',
        'foto',
        'email',
    ];
    protected static function boot()
    {
        parent::boot();

        // Membuat UUID saat menyimpan model baru
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid();
        });
    }
}

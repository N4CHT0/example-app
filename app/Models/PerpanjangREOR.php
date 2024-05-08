<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PerpanjangREOR extends Model
{
    use HasFactory;
    protected $table = 'perpanjang_reor';
    protected $primarykey = "id";
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'no_sertifikat',
        'nik',
        'npwp',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'agama',
        'no_telp',
        'provinsi',
        'kabupaten_kota',
        'kecamatan',
        'kelurahan_desa',
        'jenis_kelamin',
        'jenis_sertifikat',
        'foto',
        'scan_foto_ijazah',
        'scan_foto_npwp',
        'scan_foto_sertifikat',
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

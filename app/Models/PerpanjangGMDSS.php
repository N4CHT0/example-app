<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PerpanjangGMDSS extends Model
{
    use HasFactory;
    protected $table = 'perpanjang_gmdss';
    protected $primarykey = "id";
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'seafare_code',
        'nik',
        'nama_lengkap',
        'lembaga_diklat',
        'tempat_lahir',
        'tanggal_lahir',
        'kewarganegaraan',
        'alamat',
        'no_telp',
        'provinsi',
        'kabupaten_kota',
        'pekerjaan',
        'kecamatan',
        'kelurahan_desa',
        'kode_pos',
        'jenis_kelamin',
        'status',
        'nama_ibu_kandung',
        'nama_ayah_kandung',
        'foto',
        'scan_foto_ijazah_laut',
        'scan_foto_masa_layar',
        'scan_foto_mcu',
        'scan_foto_sertifikat_bst',
        'scan_foto_ktp',
        'scan_foto_akte',
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

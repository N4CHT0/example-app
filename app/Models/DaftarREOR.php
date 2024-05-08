<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DaftarREOR extends Model
{
    use HasFactory;
    protected $table = 'daftar_reor';
    protected $primarykey = "id";
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'pilihan_diklat',
        'periode_ujian_negara',
        'nik',
        'npwp',
        'nama_lengkap',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'tempat_lahir',
        'tanggal_lahir',
        'no_telp',
        'alamat',
        'provinsi',
        'kabupaten_kota',
        'kecamatan',
        'rt_rw',
        'kode_pos',
        'status',
        'nama_instansi',
        'nama_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'nama_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'foto',
        'scan_foto_ijazah_terakhir',
        'scan_foto_akte',
        'scan_foto_npwp',
        'scan_foto_ktp',
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

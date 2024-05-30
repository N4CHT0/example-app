<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AbsensiSiswa extends Model
{
    use HasFactory;
    protected $table = 'absensi_siswa';
    protected $primarykey = "id";
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'id_mata_pelajaran',
        'id_peserta_ujian',
        'status',
        'pertemuan',
    ];
    protected static function boot()
    {
        parent::boot();

        // Membuat UUID saat menyimpan model baru
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid();
        });
    }

    public function MataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'id_mata_pelajaran');
    }

    public function pesertaUjian()
    {
        return $this->belongsTo(PesertaUjian::class, 'id_peserta_ujian');
    }

    public function Peserta()
    {
        return $this->hasMany(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PesertaUjian extends Model
{
    use HasFactory;
    protected $table = 'peserta_ujian';
    protected $primarykey = "id";
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'id_user',
        'periode_ujian',
        'status_peserta',
        'nomor_peserta_ujian',
        'angkatan',
    ];
    protected static function boot()
    {
        parent::boot();

        // Membuat UUID saat menyimpan model baru
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid();
        });
    }
    public function Users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function NilaiUjianLokal()
    {
        return $this->hasMany(NilaiUjianLokal::class);
    }

    public function Absensi()
    {
        return $this->hasMany(AbsensiSiswa::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NilaiUjianLokal extends Model
{
    use HasFactory;
    protected $table = 'nilai_ujian_lokal';
    protected $primarykey = "id";
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'id_peserta_ujian',
        'teknik_radio',
        'service_document',
        'radio_regulation',
        'bahasa_inggris',
        'perjanjian_internasional',
        'gmdss',
        'radio_telephony',
        'ibt',
        'morse',
        'pancasila',
        'teknik_listrik',
        'naveka',
        'praktek_service_document',
        'praktek_radio_telephony',
        'praktek_morse',
        'praktek_gmdss',
    ];
    protected static function boot()
    {
        parent::boot();

        // Membuat UUID saat menyimpan model baru
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid();
        });
    }

    public function pesertaUjian()
    {
        return $this->belongsTo(PesertaUjian::class, 'id_peserta_ujian');
    }
}

<?php

namespace App\Exports;

use App\Models\PerpanjangGMDSS;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PerpanjangGMDSSExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return PerpanjangGMDSS::all();
    }

    public function map($data): array
    {
        return [
            $data->id,
            $data->seafare_code,
            $data->nik,
            $data->nama_lengkap,
            $data->lembaga_diklat,
            $data->tempat_lahir,
            $data->tanggal_lahir,
            $data->kewarganegaraan,
            $data->alamat,
            $data->no_telp,
            $data->provinsi,
            $data->kabupaten_kota,
            $data->pekerjaan,
            $data->kecamatan,
            $data->kelurahan_desa,
            $data->kode_pos,
            $data->jenis_kelamin,
            $data->status,
            $data->nama_ayah_kandung,
            $data->nama_ibu_kandung,
            $data->foto,
            $data->scan_foto_ijazah_laut,
            $data->scan_foto_masa_layar,
            $data->scan_foto_mcu,
            $data->scan_foto_sertifikat_bst,
            $data->scan_foto_ktp,
            $data->scan_foto_akte,
            $data->email,
        ];
    }

    public function headings(): array
    {
        return [
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
    }
}

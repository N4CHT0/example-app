<?php

namespace App\Exports;

use App\Models\DaftarGMDSS;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DaftarGMDSSExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DaftarGMDSS::all();
    }

    public function map($data): array
    {
        return [
            $data->id,
            $data->nik,
            $data->seafare_code,
            $data->nama_lengkap,
            $data->jenis_kelamin,
            $data->kewarganegaraan,
            $data->pekerjaan,
            $data->tempat_lahir,
            $data->tanggal_lahir,
            $data->no_telp,
            $data->alamat,
            $data->provinsi,
            $data->kabupaten_kota,
            $data->kecamatan,
            $data->kelurahan_desa,
            $data->kode_pos,
            $data->nama_ibu_kandung,
            $data->foto,
            $data->email,
        ];
    }

    public function headings(): array
    {
        return [
            'id',
            'nik',
            'seafare_code',
            'nama_lengkap',
            'jenis_kelamin',
            'kewarganegaraan',
            'pekerjaan',
            'tempat_lahir',
            'tanggal_lahir',
            'no_telp',
            'alamat',
            'provinsi',
            'kabupaten_kota',
            'kecamatan',
            'kelurahan_desa',
            'kode_pos',
            'nama_ibu_kandung',
            'foto',
            'email',
        ];
    }
}

<?php

namespace App\Exports;

use App\Models\PerpanjangREOR;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PerpanjangREORExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return PerpanjangREOR::all();
    }

    public function map($data): array
    {
        return [
            $data->id,
            $data->no_sertifikat,
            $data->nik,
            $data->npwp,
            $data->nama_lengkap,
            $data->tempat_lahir,
            $data->tanggal_lahir,
            $data->alamat,
            $data->agama,
            $data->no_telp,
            $data->provinsi,
            $data->kabupaten_kota,
            $data->kecamatan,
            $data->kelurahan_desa,
            $data->jenis_kelamin,
            $data->jenis_sertifikat,
            $data->foto,
            $data->scan_foto_ijazah,
            $data->scan_foto_npwp,
            $data->scan_foto_sertifikat,
            $data->email,
        ];
    }

    public function headings(): array
    {
        return [
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
    }
}

<?php

namespace App\Exports;

use App\Models\DaftarCOP;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DaftarCOPExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DaftarCOP::all();
    }

    public function map($data): array
    {
        return [
            $data->id,
            $data->seafare_code,
            $data->nama_lengkap,
            $data->jenis_kelamin,
            $data->jenis_sertifikat_cop,
            $data->agama,
            $data->pekerjaan,
            $data->tempat_lahir,
            $data->tanggal_lahir,
            $data->no_telp,
            $data->alamat,
            $data->provinsi,
            $data->kabupaten_kota,
            $data->kelurahan_desa,
            $data->kecamatan,
            $data->rt_rw,
            $data->kode_pos,
            $data->status,
            $data->nama_ibu,
            $data->nama_ayah,
            $data->foto,
            $data->email,
        ];
    }

    public function headings(): array
    {
        return [
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
    }
}

<?php

namespace App\Exports;

use App\Models\DaftarMCU;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DaftarMCUExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DaftarMCU::all();
    }

    public function map($data): array
    {
        return [
            $data->id,
            $data->nama_lengkap,
            $data->jabatan_diatas_kapal,
            $data->no_telp,
            $data->foto,
            $data->foto_ktp,
            $data->foto_bst,
        ];
    }

    public function headings(): array
    {
        return [
            'id',
            'nama_lengkap',
            'jabatan_diatas_kapal',
            'no_telp',
            'foto',
            'foto_ktp',
            'foto_bst',
        ];
    }
}

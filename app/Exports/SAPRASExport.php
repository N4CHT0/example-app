<?php

namespace App\Exports;

use App\Models\SAPRAS;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SAPRASExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return SAPRAS::all();
    }

    public function map($data): array
    {
        return [
            $data->id,
            $data->jenis_fasilitas,
            $data->nama_fasilitas,
            $data->jumlah,
            $data->kondisi,
            $data->status,
        ];
    }

    public function headings(): array
    {
        return [
            'id',
            'jenis_fasilitas',
            'nama_fasilitas',
            'jumlah',
            'kondisi',
            'status',
        ];
    }
}

<?php

namespace App\Exports;

use App\Models\InventorySertifikat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InventoryExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return InventorySertifikat::all();
    }
    public function map($data): array
    {
        return [
            $data->id,
            $data->jenis_sertifikat,
            $data->nama_pemilik,
            $data->no_sertifikat,
            $data->status_sertifikat,
            $data->foto_sertifikat,
            $data->bukti_pengambilan,
            $data->bukti_pengiriman,
            $data->email,
            $data->no_telp,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Jenis Sertifikat',
            'Nama Pemilik',
            'No Sertifikat',
            'Status Sertifikat',
            'Foto Sertifikat',
            'Bukti Pengambilan',
            'Bukti Pengiriman',
            'Email',
            'No Telp',
        ];
    }
}

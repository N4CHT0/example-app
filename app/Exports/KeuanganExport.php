<?php

namespace App\Exports;

use App\Models\Keuangan;
use Maatwebsite\Excel\Concerns\FromCollection;

class KeuanganExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Keuangan::all();
    }
    public function map($data): array
    {
        return [
            $data->id,
            $data->tanggal_pembayaran,
            $data->nomor_bukti,
            $data->nama,
            $data->status_pembayaran,
            $data->status_pembayaran,
            $data->jumlah_uang,
            $data->petugas,
        ];
    }

    public function headings(): array
    {
        return [
            'id',
            'tanggal_pembayaran',
            'nomor_bukti',
            'nama',
            'status_pembayaran',
            'status_pembayaran',
            'jumlah_uang',
            'petugas',
        ];
    }
}

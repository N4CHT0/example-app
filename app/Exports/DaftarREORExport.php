<?php

namespace App\Exports;

use App\Models\DaftarREOR;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DaftarREORExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DaftarREOR::all();
    }

    public function map($data): array
    {
        return [
            $data->id,
            $data->pilihan_diklat,
            $data->periode_ujian_negara,
            $data->nik,
            $data->npwp,
            $data->nama_lengkap,
            $data->nama_instansi,
            $data->pekerjaan,
            $data->status,
            $data->alamat,
            $data->provinsi,
            $data->kabupaten_kota,
            $data->kecamatan,
            $data->tanggal_lahir,
            $data->tempat_lahir,
            $data->no_telp,
            $data->email,
            $data->foto,
            $data->scan_foto_ktp,
            $data->scan_foto_ijazah_terakhir,
            $data->scan_foto_akte,
            $data->scan_foto_npwp,
            $data->nama_ibu,
            $data->pekerjaan_ibu,
            $data->penghasilan_ibu,
            $data->nama_ayah,
            $data->pekerjaan_ayah,
            $data->penghasilan_ayah,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Pilihan Diklat',
            'Periode Ujian Negara',
            'NIK',
            'NPWP',
            'Nama Lengkap',
            'Nama Instansi',
            'Pekerjaan',
            'Status',
            'Alamat',
            'Provinsi',
            'Kabupaten/Kota',
            'Kecamatan',
            'Tanggal Lahir',
            'Tempat Lahir',
            'No Telepon',
            'Email',
            'Foto',
            'Scan/Foto KTP',
            'Scan/Foto Akte',
            'Scan/Foto Ijazah Terakhir',
            'Scan/Foto NPWP',
            'Nama Ibu',
            'Pekerjaan Ibu',
            'Penghasilan Ibu',
            'Nama Ayah',
            'Pekerjaan Ayah',
            'Penghasilan Ayah',
        ];
    }
}

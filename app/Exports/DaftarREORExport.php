<?php

namespace App\Exports;

use App\Models\DaftarREOR;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class DaftarREORExport implements FromCollection, WithEvents, WithColumnWidths
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 5,
            'C' => 30,
            'D' => 30,
            'E' => 30,
            'F' => 30,
            'G' => 30,
            'H' => 30,
        ];
    }

    public function collection()
    {
        return collect([]); // Mengembalikan array kosong
    }

    public function exportData()
    {
        $data = [
            'headings' => [
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
            ],
            'rows' => [],
        ];

        $data = DaftarREOR::all();
        foreach ($data as $item) {
            $rowData = [
                $item->id,
                $item->pilihan_diklat,
                $item->periode_ujian_negara,
                $item->nik,
                $item->npwp,
                $item->nama_lengkap,
                $item->nama_instansi,
                $item->pekerjaan,
                $item->status,
                $item->alamat,
                $item->provinsi,
                $item->kabupaten_kota,
                $item->kecamatan,
                $item->tanggal_lahir,
                $item->tempat_lahir,
                $item->no_telp,
                $item->email,
                $item->foto,
                $item->scan_foto_ktp,
                $item->scan_foto_ijazah_terakhir,
                $item->scan_foto_akte,
                $item->scan_foto_npwp,
                $item->nama_ibu,
                $item->pekerjaan_ibu,
                $item->penghasilan_ibu,
                $item->nama_ayah,
                $item->pekerjaan_ayah,
                $item->penghasilan_ayah,
            ];
            $data['rows'][] = $rowData;
        }

        return $data;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Menambahkan gambar (menyesuaikan ukuran agar menempati A1 hingga H9)
                $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                $drawing->setName('Logo');
                $drawing->setDescription('Logo');
                $drawing->setPath(public_path('/kwitansi_keuangan/Kop atas .png')); // Path to your logo file
                $drawing->setHeight(400); // Set the height
                $drawing->setWidth(800); // Set the width
                $drawing->setCoordinates('D1'); // Position the image starting at cell A1
                $drawing->setWorksheet($event->sheet->getDelegate());


                // Set the header text at cell A10, spanning columns A to H
                $event->sheet->getDelegate()->setCellValue('A10', 'REPORT ALL REOR');
                $event->sheet->getDelegate()->getStyle('A10')->getFont()->setSize(16);
                $event->sheet->getDelegate()->getStyle('A10')->getFont()->setBold(true);
                $event->sheet->getDelegate()->getStyle('A10')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('A10')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $event->sheet->getDelegate()->mergeCells('A10:H13'); // Merge cells A10 to H13

                // Apply background color and border to the merged cell for "REPORT ALL INVOICE"
                $event->sheet->getDelegate()->getStyle('A10:H13')->applyFromArray([
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['argb' => 'E8E8E8'], // Gray background
                    ],
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '00000000'],
                        ],
                    ],
                ]);

                // Set the column headings at row 14, starting from column A to H
                $data = $this->exportData();
                $colIndex = 1; // Column index starting from 1 (for column A)
                foreach ($data['headings'] as $heading) {
                    $event->sheet->getDelegate()->setCellValueByColumnAndRow($colIndex, 14, $heading);
                    $colIndex++;
                }

                // Set the data rows starting from row 15
                $row = 15; // Row index starting from 15
                foreach ($data['rows'] as $rowData) {
                    $colIndex = 1; // Column index starting from 1 (for column A)
                    foreach ($rowData as $value) {
                        $event->sheet->getDelegate()->setCellValueByColumnAndRow($colIndex, $row, $value);
                        $colIndex++;
                    }
                    $row++;
                }
            },
        ];
    }
}

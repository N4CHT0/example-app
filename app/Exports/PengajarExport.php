<?php

namespace App\Exports;

use App\Models\Pengajar;
use Maatwebsite\Excel\Concerns\FromCollection;

class PengajarExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pengajar::all();
    }
}

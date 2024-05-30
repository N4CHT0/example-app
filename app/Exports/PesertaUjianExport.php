<?php

namespace App\Exports;

use App\Models\PesertaUjian;
use Maatwebsite\Excel\Concerns\FromCollection;

class PesertaUjianExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PesertaUjian::all();
    }
}

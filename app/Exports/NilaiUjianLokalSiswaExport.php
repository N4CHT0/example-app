<?php

namespace App\Exports;

use App\Models\NilaiUjianLokal;
use Maatwebsite\Excel\Concerns\FromCollection;

class NilaiUjianLokalSiswaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return NilaiUjianLokal::all();
    }
}

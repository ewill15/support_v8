<?php

namespace App\Exports;

use App\Quarentine;
use Maatwebsite\Excel\Concerns\FromCollection;

class QuatentinesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Quarentine::all();
    }
}

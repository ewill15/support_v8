<?php

namespace App\Exports;

use App\Bank;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;  //titulos de cabecera
use Maatwebsite\Excel\Concerns\WithTitle; // nombre de hoja
use Maatwebsite\Excel\Concerns\ShouldAutoSize; // tamaño automatico de columnas

class BankExport implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $banks_tmp = Bank::get();

        $banks_array = [];
        foreach ($banks_tmp as $bank) { 
            array_push($banks_array,[
                $bank->id,
                $bank->name,
                $bank->city,
                $bank->address,
                $bank->phone,
                $bank->observation,
                date('d-m-Y', strtotime($bank->created_at)),
                date('d-m-Y', strtotime($bank->updated_at))
            ]);
        }

        $banks = collect($banks_array);
        
        return $banks;
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'City',
            'Address',
            'Phone',
            'Observation',
            'Created',
            'Updated'
        ];
    }
    /**
     * @return string
     */
    public function title(): string
    {
        return 'Banks';
    }
}

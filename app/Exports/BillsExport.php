<?php

namespace App\Exports;

use App\Bill;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;  //titulos de cabecera
use Maatwebsite\Excel\Concerns\WithTitle; // nombre de hoja
use Maatwebsite\Excel\Concerns\ShouldAutoSize; // tamaño automatico de columnas

class BillsExport implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $bills_tmp = Bill::get();

        $bills_array = [];
        foreach ($bills_tmp as $bill) { 
            array_push($bills_array,[
                $bill->id,
                $bill->invoice_number,
                $bill->company->name,
                $bill->control_code,
                date('d-m-Y', strtotime($bill->date)),
                $bill->description,
                $bill->price,                
                date('d-m-Y', strtotime($bill->created_at)),
                date('d-m-Y', strtotime($bill->updated_at))
            ]);
        }

        $bills = collect($bills_array);
        
        return $bills;
    }

    public function headings(): array
    {
        return [
            '#',
            'Invoice number',
            'Company',
            'Control Code',
            'Date',
            'Description',
            'Price',
            'Created',
            'Updated'
        ];
    }
    /**
     * @return string
     */
    public function title(): string
    {
        return 'Bills';
    }
}

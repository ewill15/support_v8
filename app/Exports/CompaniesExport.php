<?php

namespace App\Exports;

use App\Company;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;  //titulos de cabecera
use Maatwebsite\Excel\Concerns\WithTitle; // nombre de hoja
use Maatwebsite\Excel\Concerns\ShouldAutoSize; // tamaño automatico de columnas

class CompaniesExport implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $companies_tmp = Company::get();

        $companies_array = [];
        foreach ($companies_tmp as $company) { 
            array_push($companies_array,[
                $company->id,
                $company->name,
                $company->address,
                $company->type,
                $company->nit,
                $company->phone,
                date('d-m-Y', strtotime($company->created_at)),
                date('d-m-Y', strtotime($company->updated_at))
            ]);
        }

        $companies = collect($companies_array);
        
        return $companies;
    }

    public function headings(): array
    {
        return [
            '#',
            'name',
            'address',
            'type',
            'nit',
            'phone',
            'Created',
            'Updated'
        ];
    }
    /**
     * @return string
     */
    public function title(): string
    {
        return 'Companies';
    }
}

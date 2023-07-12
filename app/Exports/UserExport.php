<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;  //titulos de cabecera
use Maatwebsite\Excel\Concerns\WithTitle; // nombre de hoja
use Maatwebsite\Excel\Concerns\ShouldAutoSize; // tamaño automatico de columnas

class UserExport implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $users_tmp = User::get();

        $users_array = [];
        foreach ($users_tmp as $user) { 
            array_push($users_array,[
                $user->id,
                $user->first_name,
                $user->last_name,
                $user->email,
                $user->username,
                $user->user_role,
                date('d-m-Y', strtotime($user->created_at)),
                date('d-m-Y', strtotime($user->updated_at))
            ]);
        }

        $users = collect($users_array);
        
        return $users;
    }

    public function headings(): array
    {
        return [
            '#',
            'First Name',
            'Last Name',
            'Email',
            'Username',
            'Role',
            'Created',
            'Updated'
        ];
    }
    /**
     * @return string
     */
    public function title(): string
    {
        return 'Users List';
    }
}

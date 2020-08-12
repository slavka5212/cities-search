<?php

namespace App\Exports;

use App\City;
use Maatwebsite\Excel\Concerns\FromCollection;

class CitiesExport implements FromCollection
{
    public function collection()
    {
        return City::all();
    }
}
<?php

namespace App\Imports;
   
use App\City;
use Maatwebsite\Excel\Concerns\ToModel;
    
class CitiesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return City|null
    */
    public function model(array $row)
    {
        if (!isset($row[1])) {
            return null;
        }

        return new City([
            'id' => $row[0],
            'name' => $row[1],
            'district' => $row[2],  // okres
            'region' => $row[3],  // kraj
            'ico' => $row[4], 
            'mayor' => $row[5], //starosta
            'tel' => $row[6],
            'fax' => $row[7], 
            'email' => $row[8],
            'web' => $row[9],
            'img' => $row[10],
            'lat' => $row[11],
            'lng' => $row[12],
            'url' => $row[13]
        ]);
    }
}
<?php

namespace App\Imports;

use App\Models\Institution;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class InstitutionsImport implements ToModel, WithHeadingRow, WithProgressBar
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Institution([
            'name' => $row['school_number'],
            'schoolAlias' => $row['name']
        ]);
    }
}

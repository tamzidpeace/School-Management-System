<?php

namespace App\Imports;

use App\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            //
            'id' => $row[0],
            'school_class_id'     => $row[1],
            'section_id'    => $row[2],
            'name'    => $row[3],
            'roll'    => $row[4],
            'email'    => $row[5],
            'phone'    => $row[6],
            'address'    => $row[7],
            'image'    => $row[8],
        ]);
    }
}

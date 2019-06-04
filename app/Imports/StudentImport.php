<?php

namespace App\Imports;

use App\Entities\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return student_table|\Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
//        $ro->limitRows(false, 10);
        return new Student([
            'teach_name' => $row[1],
            'stud_depart' => $row[2],
            'stud_id' => $row[3],
            'stud_name' => $row[4],
            'stud_sex' => $row[5],
            'stud_address' => $row[6],
            'stud_mo' => $row[7],
            'stud_fa' => $row[8],
        ]);
    }
}

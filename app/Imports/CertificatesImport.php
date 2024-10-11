<?php

namespace App\Imports;

use App\Models\Certificate;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CertificatesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Certificate([
            'first_name'             => $row['first_name'],
            'middle_name'            => $row['middle_name'],
            'last_name'              => $row['last_name'],
            'certificate_number'     => $row['certificate_number'],
            'institution_id'         => $row['institution_id'], 
            'student_identification' => $row['student_identification'],
            'qualification_type'     => $row['qualification_type'],
            'programme'              => $row['programme'],
            'class'                  => $row['class'],
            'gender'                 => $row['gender'],
            'year_of_entry'          => $row['year_of_entry'],
            'year_of_completion'     => $row['year_of_completion'], 
        ]);
    }
}

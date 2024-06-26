<?php

namespace App\Exports;

use App\Models\Certificate;
use App\Models\SearchLog;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class VerifiedCertificatesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $userId = Auth::id();
        $searchLogs = SearchLog::where('user_id', $userId)->get();
        $certificates = collect();

        foreach ($searchLogs as $log) {
            $certificate = Certificate::where('certificate_number', $log->search_term)
                ->with('institution')
                ->first();
            
            if ($certificate) {
                $certificates[] = [
                    'Institution' => $certificate->institution ? $certificate->institution->institutions : 'No Institution Name',
                    'First Name' => $certificate->first_name,
                    'Middle Name' => $certificate->middle_name,
                    'Last Name' => $certificate->last_name,
                    'Date of Birth' => $certificate->date_of_birth,
                    'Gender' => $certificate->gender,
                    'Programme' => $certificate->programme, // Adjusted field name
                    'Certificate Number' => $certificate->certificate_number,
                    'Student Identification' => $certificate->student_identification,
                    'Qualification Type' => $certificate->qualification_type,
                    'Class' => $certificate->class, // Adjusted field name
                    'Year of Entry' => $certificate->year_of_entry,
                    'Year of Completion' => $certificate->year_of_completion,
                ];
            }
        }

        return $certificates;
    }

    public function headings(): array
    {
        return [
            'Institution',
            'First Name',
            'Middle Name',
            'Last Name',
            'Date of Birth',
            'Gender',
            'Programme',
            'Certificate Number',
            'Student Identification',
            'Qualification Type',
            'Class',
            'Year of Entry',
            'Year of Completion'
        ];
    }
}
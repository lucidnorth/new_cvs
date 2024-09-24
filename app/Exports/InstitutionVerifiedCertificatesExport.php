<?php

namespace App\Exports;

use App\Models\SearchLog;
use App\Models\Certificate;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InstitutionVerifiedCertificatesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $user = Auth::user();
        $institution = $user->my_institution;
        $institutionCertificates = collect();

        if ($institution) {
            // Get all certificate numbers associated with this institution
            $certificateNumbers = Certificate::where('institution_id', $institution->id)
                ->pluck('certificate_number')
                ->toArray();

            // Fetch search logs that match the certificate numbers
            $searchLogs = SearchLog::whereIn('search_term', $certificateNumbers)
                ->whereHas('certificate', function ($query) use ($institution) {
                    $query->where('institution_id', $institution->id);
                })
                ->with('certificate')
                ->get();

            foreach ($searchLogs as $log) {
                $institutionCertificates[] = [
                    'Institution' => $log->certificate->institution->name ?? 'N/A',
                    'First Name' => $log->certificate->first_name ?? 'N/A',
                    'Middle Name' => $log->certificate->middle_name ?? 'N/A',
                    'Last Name' => $log->certificate->last_name ?? 'N/A',
                    'Date of Birth' => $log->certificate->date_of_birth ?? 'N/A',
                    'Gender' => $log->certificate->gender ?? 'N/A',
                    'Programme' => $log->certificate->programme ?? 'N/A',
                    'Certificate Number' => $log->certificate->certificate_number,
                    'Student Identification' => $log->certificate->student_identification ?? 'N/A',
                    'Qualification Type' => $log->certificate->qualification_type ?? 'N/A',
                    'Class' => $log->certificate->class ?? 'N/A',
                    'Year of Entry' => $log->certificate->year_of_entry ?? 'N/A',
                    'Year of Completion' => $log->certificate->year_of_completion ?? 'N/A',
                ];
            }
        }

        return $institutionCertificates;
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
            'Year of Completion',
        ];
    }
}

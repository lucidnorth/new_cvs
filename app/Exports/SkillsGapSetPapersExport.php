<?php

namespace App\Exports;

use App\Models\Paper;
use App\Models\PapersUpload;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SkillsGapSetPapersExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $userId = Auth::id();
        $skillsGapSetPapers = Paper::where([
            ['user_id', '=', $userId],
            ['category', '=', 'Skills Gap Set'],
        ])->get();

        $papersData = collect();

        foreach ($skillsGapSetPapers as $paper) {
            $papersData[] = [
                'Paper Name' => $paper->name ? $paper->name : 'No Paper Name',
                'Category' => $paper->category,
                'Created At' => $paper->created_at,
            ];
        }

        return $papersData;
    }

    public function headings(): array
    {
        return [
            'Paper Name',
            'Category',
            'Created At',
        ];
    }
}

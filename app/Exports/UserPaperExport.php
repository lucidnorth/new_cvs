<?php

namespace App\Exports;

use App\Models\Paper;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class UserPaperExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $userId = Auth::id();
        $userPaper = Paper::where('user_id', $userId)->get();

        $papersData = collect();

        foreach ($userPaper as $paper) {
            $papersData[] = [
                'Paper Name' => $paper->name ? $paper->name : 'No paper Name',
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

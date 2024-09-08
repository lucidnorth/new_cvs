<?php

namespace App\Exports;

use App\Models\SkillSearchLog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SkillSearchLogExport implements FromCollection, WithHeadings
{
    protected $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Fetch the collection of SkillSearchLogs for the specified user.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return SkillSearchLog::where('user_id', $this->userId)
            ->select('id', 'search_term', 'created_at')
            ->get();
    }

    /**
     * Define the headings for the exported Excel sheet.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Search Term',
            'Searched On',
        ];
    }
}

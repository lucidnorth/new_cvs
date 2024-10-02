<?php

namespace App\Exports;

use App\Models\Finance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class InstitutionPaymentsExport implements FromCollection, WithHeadings
{
    protected $institution;

    public function __construct($institution)
    {
        $this->institution = $institution;
    }

    public function collection()
    {
        // Fetch all payments for the institution
        $payments = Finance::where('institution', $this->institution->institutions)
            ->orderBy('created_at', 'asc')
            ->get(['amount', 'created_at']);

        // Add a new column "month" for each payment, indicating its month and year
        foreach ($payments as $payment) {
            $payment->month = Carbon::parse($payment->created_at)->format('F Y'); 
        }

        return $payments;
    }

    public function headings(): array
    {
        return [
            'Month',
            'Amount',
            'Date'
        ];
    }
}

<?php

namespace App\Exports;

use App\Models\UserPackage;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserPackagesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $userId = Auth::id();
        $userPackages = UserPackage::where('user_id', $userId)->get();

        $packagesData = collect();

        foreach ($userPackages as $package) {
            $packagesData[] = [
                'Package Name' => $package->package ? $package->package->name : 'No Package Name',
                'Amount' => $package->amount,
                'Transaction Reference' => $package->transaction_reference,
                'Created At' => $package->created_at,
            ];
        }

        return $packagesData;
    }

    public function headings(): array
    {
        return [
            'Package Name',
            'Amount',
            'Transaction Reference',
            'Created At',
        ];
    }
}

<?php

namespace App\Imports;

use App\Models\Institution;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Storage;

class InstitutionImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Handle the logo field if the logo is uploaded via file path
        $logoPath = null;
        if (!empty($row['logo'])) {
            // Store the logo file and get its path
            $logoPath = $this->storeLogo($row['logo']);
        }

        return new Institution([
            'institutions' => $row['institutions'], // Institution name
            'logo'         => $logoPath,            // Logo path or filename
            'address'      => $row['address'],      // Address
            'phone'        => $row['phone'],        // Phone
            'email'        => $row['email'],        // Email
            'password'     => Hash::make($row['password']), // Encrypt password
        ]);
    }

    /**
     * Store the logo file if it is provided.
     *
     * @param string $logo
     * @return string|null
     */
    protected function storeLogo($logo)
    {
        if (filter_var($logo, FILTER_VALIDATE_URL)) {
            // If the logo is a URL, download the file and store it
            $logoContents = file_get_contents($logo);
            $logoName = basename($logo);
            $path = Storage::put("public/logos/{$logoName}", $logoContents);
            return $path;
        }

        // If the logo is a local file path, store the file directly
        if (Storage::exists($logo)) {
            return $logo;
        }

        return null;
    }
}

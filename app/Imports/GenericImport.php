<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class GenericImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Handle the collection in the controller itself.
    }
}

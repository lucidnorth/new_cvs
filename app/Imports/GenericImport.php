<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class GenericImport implements ToCollection
{
    protected $importedRows;

    public function collection(Collection $rows)
    {
        // Store the rows for later access.
        $this->importedRows = $rows;
    }

    public function getImportedRows()
    {
        // Returns the imported rows to be handled in the controller.
        return $this->importedRows;
    }
}

<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\GenericImport;

trait ExcelImportTrait // Renamed from CsvImportTrait to ExcelImportTrait
{
    public function processExcelImport(Request $request)
    {
        try {
            $filename = $request->input('filename', false);
            $path     = storage_path('app/excel_import/' . $filename); // Updated for Excel import

            $hasHeader = $request->input('hasHeader', false);

            $fields = $request->input('fields', false);
            $fields = array_flip(array_filter($fields));

            $modelName = $request->input('modelName', false);
            $model     = "App\Models\\" . $modelName;

            // Load Excel data using Maatwebsite\Excel
            $importedData = Excel::toCollection(new GenericImport, $path)->first(); // Updated to use Excel
            $insert = [];

            $institutionId = session()->get('institution_id') ?? NULL;

            foreach ($importedData as $key => $row) {
                if ($hasHeader && $key == 0) {
                    continue;
                }

                $tmp = [];
                foreach ($fields as $header => $k) {
                    if (isset($row[$k])) {
                        $tmp[$header] = $row[$k];
                    }
                }

                $tmp['institution_id'] = $institutionId;

                if (count($tmp) > 0) {
                    $insert[] = $tmp;
                }
            }

            $for_insert = array_chunk($insert, 100);

            foreach ($for_insert as $insert_item) {
                $model::insert($insert_item);
            }

            $rows  = count($insert);
            $table = Str::plural($modelName);

            File::delete($path);

            session()->flash('message', trans('global.app_imported_rows_to_table', ['rows' => $rows, 'table' => $table]));

            return redirect($request->input('redirect'));
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function parseExcelImport(Request $request)
    {
        $file = $request->file('excel_file'); // Updated to excel_file
        $request->validate([
            'excel_file' => 'mimes:xlsx,xls,csv', // Allow Excel and CSV files
        ]);

        $path      = $file->path();
        $hasHeader = $request->input('header', false) ? true : false;

        // Read the first sheet and get headers
        $importedData = Excel::toCollection(new GenericImport, $path)->first(); // Read Excel file
        $headers = $importedData->first()->toArray();
        $lines   = $importedData->slice(1, 5)->toArray(); // Get the first 5 lines after headers

        $filename = Str::random(10) . '.xlsx'; // Save Excel file with random name
        $file->storeAs('excel_import', $filename);

        $modelName     = $request->input('model', false);
        $fullModelName = "App\Models\\" . $modelName;

        $model     = new $fullModelName();
        $fillables = $model->getFillable();

        $redirect = url()->previous();

        $routeName = 'admin.' . strtolower(Str::plural(Str::kebab($modelName))) . '.processExcelImport'; // Updated route for Excel

        return view('excelImport.parseInput', compact('headers', 'filename', 'fillables', 'hasHeader', 'modelName', 'lines', 'redirect', 'routeName'));
    }
}

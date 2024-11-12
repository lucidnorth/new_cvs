<?php


namespace App\Imports;

use App\Models\Certificate;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Illuminate\Support\Str;


class CertificatesImport implements ToModel, WithHeadingRow
{
    private $institutionId;
    private $images = [];

    public function __construct($institutionId)
    {
        $this->institutionId = $institutionId;
    }

    // public function drawings(): array
    // {
    //     return $this->images;
    // }

    // public function drawing(Drawing $drawing)
    // {
    //     $filename = time() . '_' . $drawing->getName();
    //     $path = 'tmp/uploads/' . $filename; // Use a temporary path

    //     // Save the image to temporary storage
    //     Storage::put($path, file_get_contents($drawing->getPath()));

    //     // Store the path with coordinates to map to the right row
    //     $this->images[$drawing->getCoordinates()] = storage_path('app/' . $path);
    // }

    public function model(array $row)
    {
        // Validate required fields
        if (empty($row['first_name']) || empty($row['last_name'])) {
            return null;
        }

        // if (isset($row['photo'])) {
        //     // Assuming the image column contains the path/URL of the image
        //     $imagePath = $row['photo'];
            
        //     // If you need to download and save the image locally:
        //     $imageContents = file_get_contents($imagePath);
        //     $imageName = Str::random(10) . '.jpg'; // Generate a random name for the image
        //     Storage::put('public/uploads/' . $imageName, $imageContents);
            
        //     $localImagePath = 'certificateimages/' . $imageName;
        // }


        // Map image path using the Excel cell coordinates
        // $photoPath = $this->images[$row['photo']] ?? null;

        return new Certificate([
            'institution_id'        => $this->institutionId,
            'first_name'             => $row['first_name'],
            'middle_name'            => $row['middle_name'],
            'last_name'              => $row['last_name'],
            'certificate_number'     => $row['certificate_number'],
            'student_identification' => $row['student_identification'],
            'qualification_type'     => $row['qualification_type'],
            'institution'            => $row['institution'],
            'programme'              => $row['programme'],
            'class'                  => $row['class'],
            'gender'                 => $row['gender'],
            'date_of_birth'          => $row['date_of_birth'],
            'year_of_entry'          => $row['year_of_entry'],
            'year_of_completion'     => $row['year_of_completion'],
            'photo'                 => isset($localImagePath) ? $localImagePath : null,  // Save the path in the database
        ]);

        //  // Map the photo based on coordinates if available
        // if (isset($this->images[$row['photo']])) {
        //     $photoPath = $this->images[$row['photo']];

        //     // Attach the photo to the media collection
        //     $certificate->addMedia($photoPath)
        //                 ->toMediaCollection('photo'); // Save in the 'photo' collection

        //     // Delete the temporary file after saving to media library
        //     Storage::delete($photoPath);
        // }

    }
}

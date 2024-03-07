<?php

namespace App\Http\Requests;

use App\Models\Certificate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCertificateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('certificate_edit');
    }

    public function rules()
    {
        return [
            'first_name' => [
                'string',
                'required',
            ],
            'middle_name' => [
                'string',
                'nullable',
            ],
            'last_name' => [
                'string',
                'required',
            ],
            'gender' => [
                'required',
            ],
            'date_of_birth' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'institution_id' => [
                'required',
                'integer',
            ],
            'certificate_number' => [
                'string',
                'required',
            ],
            'student_identification' => [
                'string',
                'required',
            ],
            'qualification_type' => [
                'string',
                'required',
            ],
            'programme' => [
                'string',
                'required',
            ],
            'class' => [
                'string',
                'required',
            ],
            'year_of_entry' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'year_of_completion' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}

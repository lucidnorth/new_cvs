<?php

namespace App\Http\Requests;

use App\Models\Institution;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInstitutionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('institution_edit');
    }

    public function rules()
    {
        return [
            'institutions' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'required',
            ],
            'phone' => [
                'numeric',
                'required',
            ],
            'email' => [
                'required',
            ],
        ];
    }
}

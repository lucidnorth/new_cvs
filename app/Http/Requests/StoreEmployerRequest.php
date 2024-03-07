<?php

namespace App\Http\Requests;

use App\Models\Employer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEmployerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('employer_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'numeric',
                'required',
            ],
            'email' => [
                'required',
            ],
            'password' => [
                'required',
            ],
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\Upload;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUploadRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('upload_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
            'uplaods' => [
                'required',
            ],
        ];
    }
}

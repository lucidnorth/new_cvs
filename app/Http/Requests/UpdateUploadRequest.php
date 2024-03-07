<?php

namespace App\Http\Requests;

use App\Models\Upload;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUploadRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('upload_edit');
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

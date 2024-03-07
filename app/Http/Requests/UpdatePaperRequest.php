<?php

namespace App\Http\Requests;

use App\Models\Paper;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePaperRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('paper_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'papers' => [
                'required',
            ],
            'file_upload' => [
                'required',
            ],
        ];
    }
}

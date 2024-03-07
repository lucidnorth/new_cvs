<?php

namespace App\Http\Requests;

use App\Models\Employer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEmployerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('employer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:employers,id',
        ];
    }
}

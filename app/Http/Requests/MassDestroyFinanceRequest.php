<?php

namespace App\Http\Requests;

use App\Models\Finance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFinanceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('finance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:finances,id',
        ];
    }
}

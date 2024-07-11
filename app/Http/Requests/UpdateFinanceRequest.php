<?php

namespace App\Http\Requests;

use App\Models\Finance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFinanceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('finance_edit');
    }

    public function rules()
    {
        return [
            'amount' => [
                'required',
            ],
            'payment_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'status' => [
                'string',
                'required',
            ],
            'institutions' => [
                'required',
            ],
        ];
    }
}

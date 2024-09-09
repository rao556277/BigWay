<?php

namespace App\Http\Requests;

use App\Models\Earning;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEarningRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('earning_edit'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'amount' => [
                'numeric',
                'required',
            ],
            'earning.date' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'payment_method' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
        ];
    }
}

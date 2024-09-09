<?php

namespace App\Http\Requests;

use App\Models\Commission;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCommissionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('commission_create'),
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
                'string',
                'nullable',
            ],
            'commission.date' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'commission_rate' => [
                'numeric',
                'nullable',
            ],
            'driver_id' => [
                'integer',
                'exists:drivers,id',
                'nullable',
            ],
        ];
    }
}

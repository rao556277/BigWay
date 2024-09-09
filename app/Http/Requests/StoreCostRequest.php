<?php

namespace App\Http\Requests;

use App\Models\Cost;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCostRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('cost_create'),
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
            'item_type' => [
                'string',
                'required',
            ],
            'cost' => [
                'numeric',
                'nullable',
            ],
            'cost.effective_date' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
            'cost.end_date' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'vehicle_id' => [
                'integer',
                'exists:vehicles,id',
                'nullable',
            ],
        ];
    }
}

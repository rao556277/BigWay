<?php

namespace App\Http\Requests;

use App\Models\Junction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreJunctionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('junction_create'),
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
            'junction_name' => [
                'string',
                'nullable',
            ],
            'junction.arrival_time' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'junction.departure_time' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'distance_from_last_location' => [
                'numeric',
                'nullable',
            ],
            'location_id' => [
                'integer',
                'exists:locations,id',
                'nullable',
            ],
        ];
    }
}

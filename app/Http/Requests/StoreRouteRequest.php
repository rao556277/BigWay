<?php

namespace App\Http\Requests;

use App\Models\Route;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRouteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('route_create'),
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
            'route_name' => [
                'string',
                'nullable',
            ],
            'start_location_type' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'start_location' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'end_location_type' => [
                'string',
                'nullable',
            ],
            'end_location' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'total_distance' => [
                'numeric',
                'nullable',
            ],
            'estimated_time' => [
                'string',
                'nullable',
            ],
        ];
    }
}

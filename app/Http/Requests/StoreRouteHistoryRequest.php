<?php

namespace App\Http\Requests;

use App\Models\RouteHistory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRouteHistoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('route_history_create'),
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
            'vehicle' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'routeHistory.start_time' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'routeHistory.end_time' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'distance_travelled' => [
                'numeric',
                'nullable',
            ],
            'vendor' => [
                'array',
            ],
            'vendor.*.id' => [
                'integer',
                'exists:vendors,id',
            ],
            'vehicle_type' => [
                'array',
            ],
            'vehicle_type.*.id' => [
                'integer',
                'exists:vehicletypes,id',
            ],
            'route' => [
                'array',
            ],
            'route.*.id' => [
                'integer',
                'exists:routes,id',
            ],
        ];
    }
}

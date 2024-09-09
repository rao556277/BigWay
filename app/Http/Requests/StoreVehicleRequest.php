<?php

namespace App\Http\Requests;

use App\Models\Vehicle;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVehicleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('vehicle_create'),
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
            'vehicle_number' => [
                'string',
                'required',
            ],
            'capacity' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'caretaker' => [
                'array',
            ],
            'caretaker.*.id' => [
                'integer',
                'exists:caretakers,id',
            ],
            'driver_id' => [
                'integer',
                'exists:drivers,id',
                'nullable',
            ],
            'route_id' => [
                'integer',
                'exists:routes,id',
                'nullable',
            ],
            'vehicle_type' => [
                'array',
            ],
            'vehicle_type.*.id' => [
                'integer',
                'exists:vehicletypes,id',
            ],
        ];
    }
}

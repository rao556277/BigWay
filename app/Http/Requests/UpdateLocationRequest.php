<?php

namespace App\Http\Requests;

use App\Models\Location;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLocationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('location_edit'),
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
            'user' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'latitude' => [
                'numeric',
                'required',
            ],
            'longitude' => [
                'numeric',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
        ];
    }
}

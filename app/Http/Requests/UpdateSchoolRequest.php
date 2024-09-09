<?php

namespace App\Http\Requests;

use App\Models\School;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSchoolRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('school_edit'),
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
            'name' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'required',
            ],
            'contact_number' => [
                'string',
                'required',
            ],
            'location_id' => [
                'integer',
                'exists:locations,id',
                'nullable',
            ],
            'user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }
}

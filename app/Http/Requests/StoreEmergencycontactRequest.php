<?php

namespace App\Http\Requests;

use App\Models\Emergencycontact;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEmergencycontactRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('emergencycontact_create'),
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
            'relationship' => [
                'string',
                'required',
            ],
            'contact_1' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'contact_2' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'student_id' => [
                'integer',
                'exists:students,id',
                'nullable',
            ],
        ];
    }
}

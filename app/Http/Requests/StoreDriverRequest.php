<?php

namespace App\Http\Requests;

use App\Models\Driver;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDriverRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('driver_create'),
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
            'license_number' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'cnic' => [
                'string',
                'nullable',
            ],
            'medical_condition' => [
                'string',
                'nullable',
            ],
            'emergency_medication' => [
                'string',
                'nullable',
            ],
            'allergies' => [
                'string',
                'nullable',
            ],
            'hire_date' => [
                'string',
                'nullable',
            ],
            'image_url' => [
                'string',
                'nullable',
            ],
            'blood_group' => [
                'nullable',
                'in:' . implode(',', array_keys(Driver::BLOOD_GROUP_SELECT)),
            ],
            'dob' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'license_expiry_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'gender' => [
                'nullable',
                'in:' . implode(',', array_keys(Driver::GENDER_RADIO)),
            ],
        ];
    }
}

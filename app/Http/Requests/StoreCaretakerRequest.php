<?php

namespace App\Http\Requests;

use App\Models\Caretaker;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCaretakerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('caretaker_create'),
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
            'image_url' => [
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
            'employment_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'date_of_birth' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'blood_group' => [
                'nullable',
                'in:' . implode(',', array_keys(Caretaker::BLOOD_GROUP_SELECT)),
            ],
            'vehicle_type_id' => [
                'integer',
                'exists:vehicletypes,id',
                'nullable',
            ],
            'emergency_contact_id' => [
                'integer',
                'exists:emergencycontacts,id',
                'nullable',
            ],
            'gender' => [
                'nullable',
                'in:' . implode(',', array_keys(Caretaker::GENDER_RADIO)),
            ],
        ];
    }
}

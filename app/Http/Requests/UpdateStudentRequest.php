<?php

namespace App\Http\Requests;

use App\Models\Student;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStudentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('student_edit'),
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
            'dob' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'location' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'grade' => [
                'string',
                'nullable',
            ],
            'attendance_status' => [
                'string',
                'nullable',
            ],
            'qr_code' => [
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
            'blood_group' => [
                'nullable',
                'in:' . implode(',', array_keys(Student::BLOOD_GROUP_SELECT)),
            ],
            'vehicle' => [
                'array',
            ],
            'vehicle.*.id' => [
                'integer',
                'exists:vehicles,id',
            ],
            'gender' => [
                'nullable',
                'in:' . implode(',', array_keys(Student::GENDER_RADIO)),
            ],
            'school_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }
}

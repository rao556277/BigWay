<?php

namespace App\Http\Requests;

use App\Models\Attendance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAttendanceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('attendance_edit'),
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
            'route' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'attendance.date' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'attendance.pickup_time' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'attendance.dropoff_time' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'student_id' => [
                'integer',
                'exists:students,id',
                'nullable',
            ],
        ];
    }
}

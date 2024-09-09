<?php

namespace App\Http\Requests;

use App\Models\Booking;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBookingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('booking_create'),
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
            'booking_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'start_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'end_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'status' => [
                'string',
                'nullable',
            ],
            'cost' => [
                'numeric',
                'nullable',
            ],
            'amount' => [
                'numeric',
                'nullable',
            ],
            'payment_status' => [
                'string',
                'nullable',
            ],
            'booking_status' => [
                'string',
                'nullable',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'user' => [
                'array',
            ],
            'user.*.id' => [
                'integer',
                'exists:users,id',
            ],
            'student' => [
                'array',
            ],
            'student.*.id' => [
                'integer',
                'exists:students,id',
            ],
            'vehicle' => [
                'array',
            ],
            'vehicle.*.id' => [
                'integer',
                'exists:vehicles,id',
            ],
        ];
    }
}

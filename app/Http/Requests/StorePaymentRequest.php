<?php

namespace App\Http\Requests;

use App\Models\Payment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePaymentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('payment_create'),
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
            'transaction' => [
                'string',
                'required',
                'unique:payments,transaction',
            ],
            'amount' => [
                'numeric',
                'nullable',
            ],
            'payment_method' => [
                'string',
                'nullable',
            ],
            'reference_number' => [
                'string',
                'nullable',
            ],
            'payment.date' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'guardian_id' => [
                'integer',
                'exists:guardians,id',
                'nullable',
            ],
            'student_id' => [
                'integer',
                'exists:students,id',
                'nullable',
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

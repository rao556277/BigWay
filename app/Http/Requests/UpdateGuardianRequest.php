<?php

namespace App\Http\Requests;

use App\Models\Guardian;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGuardianRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('guardian_edit'),
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
                'nullable',
            ],
            'payment_details' => [
                'string',
                'nullable',
            ],
            'verified' => [
                'string',
                'nullable',
            ],
            'gender' => [
                'nullable',
                'in:' . implode(',', array_keys(Guardian::GENDER_RADIO)),
            ],
        ];
    }
}

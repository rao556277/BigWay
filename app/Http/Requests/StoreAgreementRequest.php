<?php

namespace App\Http\Requests;

use App\Models\Agreement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAgreementRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('agreement_create'),
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
            'party_type' => [
                'string',
                'nullable',
            ],
            'agreement.agreement_date' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'party' => [
                'string',
                'nullable',
            ],
            'terms' => [
                'string',
                'nullable',
            ],
            'agreement.expiry_date' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'signature_image' => [
                'string',
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

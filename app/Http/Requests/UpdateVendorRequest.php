<?php

namespace App\Http\Requests;

use App\Models\Vendor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVendorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('vendor_edit'),
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
            'contact_details' => [
                'string',
                'nullable',
            ],
            'contract_details' => [
                'string',
                'nullable',
            ],
            'vendor_type' => [
                'string',
                'nullable',
            ],
            'user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'gender' => [
                'nullable',
                'in:' . implode(',', array_keys(Vendor::GENDER_RADIO)),
            ],
        ];
    }
}

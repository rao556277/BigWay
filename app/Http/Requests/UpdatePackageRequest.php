<?php

namespace App\Http\Requests;

use App\Models\Package;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePackageRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('package_edit'),
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
            'package_name' => [
                'string',
                'required',
            ],
            'price' => [
                'numeric',
                'nullable',
            ],
            'duration' => [
                'string',
                'nullable',
            ],
            'package_type' => [
                'string',
                'nullable',
            ],
            'user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'description' => [
                'string',
                'nullable',
            ],
        ];
    }
}

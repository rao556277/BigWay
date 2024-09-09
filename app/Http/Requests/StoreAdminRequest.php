<?php

namespace App\Http\Requests;

use App\Models\Admin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAdminRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('admin_create'),
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
            'permissions' => [
                'string',
                'nullable',
            ],
            'role' => [
                'string',
                'nullable',
            ],
            'blood_group' => [
                'nullable',
                'in:' . implode(',', array_keys(Admin::BLOOD_GROUP_SELECT)),
            ],
        ];
    }
}

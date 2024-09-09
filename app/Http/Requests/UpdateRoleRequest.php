<?php

namespace App\Http\Requests;

use App\Models\Role;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRoleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('role_edit'),
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
            'title' => [
                'string',
                'required',
            ],
            'permissions' => [
                'required',
                'array',
            ],
            'permissions.*.id' => [
                'integer',
                'exists:permissions,id',
            ],
        ];
    }
}

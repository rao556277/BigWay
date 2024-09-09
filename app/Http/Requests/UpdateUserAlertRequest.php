<?php

namespace App\Http\Requests;

use App\Models\UserAlert;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserAlertRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('user_alert_edit'),
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
            'message' => [
                'string',
                'required',
            ],
            'link' => [
                'string',
                'nullable',
            ],
            'users' => [
                'required',
                'array',
            ],
            'users.*.id' => [
                'integer',
                'exists:users,id',
            ],
        ];
    }
}

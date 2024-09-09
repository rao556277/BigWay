<?php

namespace App\Http\Requests;

use App\Models\Notification;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNotificationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('notification_edit'),
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
            'user' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'type' => [
                'string',
                'nullable',
            ],
            'message' => [
                'string',
                'nullable',
            ],
            'for' => [
                'array',
            ],
            'for.*.id' => [
                'integer',
                'exists:users,id',
            ],
            'for_user' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}

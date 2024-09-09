<?php

namespace App\Http\Requests;

use App\Models\Log;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLogRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('log_edit'),
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
            'entity_type' => [
                'string',
                'nullable',
            ],
            'entity' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'action' => [
                'string',
                'nullable',
            ],
            'log.timezone' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'user' => [
                'array',
            ],
            'user.*.id' => [
                'integer',
                'exists:users,id',
            ],
            'performed_by_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'created_by_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }
}

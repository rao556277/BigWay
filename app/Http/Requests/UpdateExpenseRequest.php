<?php

namespace App\Http\Requests;

use App\Models\Expense;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateExpenseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('expense_edit'),
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
            'expense.date' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'amount' => [
                'numeric',
                'nullable',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'expense_type' => [
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

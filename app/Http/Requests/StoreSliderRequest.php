<?php

namespace App\Http\Requests;

use App\Models\Slider;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSliderRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('slider_create'),
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
            'image_url' => [
                'string',
                'required',
            ],
            'title' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'caption' => [
                'string',
                'nullable',
            ],
            'link_url' => [
                'string',
                'required',
            ],
            'display_order' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\Setting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSettingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('setting_edit'),
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
            'logo_url' => [
                'string',
                'nullable',
            ],
            'company_name' => [
                'string',
                'required',
            ],
            'currency' => [
                'string',
                'nullable',
            ],
            'contact_email' => [
                'string',
                'nullable',
            ],
            'contact_phone' => [
                'string',
                'nullable',
            ],
            'language' => [
                'string',
                'nullable',
            ],
            'maintenance_mode' => [
                'string',
                'nullable',
            ],
            'backup_frequency' => [
                'string',
                'nullable',
            ],
            'backup_location' => [
                'string',
                'nullable',
            ],
            'support_url' => [
                'string',
                'nullable',
            ],
            'social_media_links' => [
                'string',
                'nullable',
            ],
            'terms_url' => [
                'string',
                'nullable',
            ],
            'privacy_policy_url' => [
                'string',
                'nullable',
            ],
            'timezone' => [
                'string',
                'nullable',
            ],
        ];
    }
}

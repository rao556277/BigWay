<?php

namespace App\Http\Livewire\Setting;

use App\Models\Setting;
use Livewire\Component;

class Edit extends Component
{
    public Setting $setting;

    public function mount(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function render()
    {
        return view('livewire.setting.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->setting->save();

        return redirect()->route('admin.settings.index');
    }

    protected function rules(): array
    {
        return [
            'setting.logo_url' => [
                'string',
                'nullable',
            ],
            'setting.company_name' => [
                'string',
                'required',
            ],
            'setting.currency' => [
                'string',
                'nullable',
            ],
            'setting.contact_email' => [
                'string',
                'nullable',
            ],
            'setting.contact_phone' => [
                'string',
                'nullable',
            ],
            'setting.language' => [
                'string',
                'nullable',
            ],
            'setting.maintenance_mode' => [
                'string',
                'nullable',
            ],
            'setting.backup_frequency' => [
                'string',
                'nullable',
            ],
            'setting.backup_location' => [
                'string',
                'nullable',
            ],
            'setting.support_url' => [
                'string',
                'nullable',
            ],
            'setting.social_media_links' => [
                'string',
                'nullable',
            ],
            'setting.terms_url' => [
                'string',
                'nullable',
            ],
            'setting.privacy_policy_url' => [
                'string',
                'nullable',
            ],
            'setting.timezone' => [
                'string',
                'nullable',
            ],
        ];
    }
}

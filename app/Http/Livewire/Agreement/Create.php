<?php

namespace App\Http\Livewire\Agreement;

use App\Models\Agreement;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public Agreement $agreement;

    public array $listsForFields = [];

    public function mount(Agreement $agreement)
    {
        $this->agreement = $agreement;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.agreement.create');
    }

    public function submit()
    {
        $this->validate();

        $this->agreement->save();

        return redirect()->route('admin.agreements.index');
    }

    protected function rules(): array
    {
        return [
            'agreement.party_type' => [
                'string',
                'nullable',
            ],
            'agreement.agreement_date' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'agreement.description' => [
                'string',
                'nullable',
            ],
            'agreement.party' => [
                'string',
                'nullable',
            ],
            'agreement.terms' => [
                'string',
                'nullable',
            ],
            'agreement.expiry_date' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'agreement.signature_image' => [
                'string',
                'nullable',
            ],
            'agreement.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user'] = User::pluck('name', 'id')->toArray();
    }
}

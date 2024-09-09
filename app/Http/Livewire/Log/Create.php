<?php

namespace App\Http\Livewire\Log;

use App\Models\Log;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public Log $log;

    public array $user = [];

    public array $listsForFields = [];

    public function mount(Log $log)
    {
        $this->log = $log;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.log.create');
    }

    public function submit()
    {
        $this->validate();

        $this->log->save();
        $this->log->user()->sync($this->user);

        return redirect()->route('admin.logs.index');
    }

    protected function rules(): array
    {
        return [
            'log.entity_type' => [
                'string',
                'nullable',
            ],
            'log.entity' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'log.action' => [
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
            'log.performed_by_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'log.created_by_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user']         = User::pluck('name', 'id')->toArray();
        $this->listsForFields['performed_by'] = User::pluck('name', 'id')->toArray();
        $this->listsForFields['created_by']   = User::pluck('name', 'id')->toArray();
    }
}

<?php

namespace App\Http\Livewire\Notification;

use App\Models\Notification;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public array $for = [];

    public array $listsForFields = [];

    public Notification $notification;

    public function mount(Notification $notification)
    {
        $this->notification = $notification;
        $this->for          = $this->notification->for()->pluck('id')->toArray();
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.notification.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->notification->save();
        $this->notification->for()->sync($this->for);

        return redirect()->route('admin.notifications.index');
    }

    protected function rules(): array
    {
        return [
            'notification.user' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'notification.type' => [
                'string',
                'nullable',
            ],
            'notification.message' => [
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
            'notification.for_user' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['for'] = User::pluck('name', 'id')->toArray();
    }
}

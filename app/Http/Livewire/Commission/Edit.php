<?php

namespace App\Http\Livewire\Commission;

use App\Models\Commission;
use App\Models\Driver;
use Livewire\Component;

class Edit extends Component
{
    public Commission $commission;

    public array $listsForFields = [];

    public function mount(Commission $commission)
    {
        $this->commission = $commission;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.commission.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->commission->save();

        return redirect()->route('admin.commissions.index');
    }

    protected function rules(): array
    {
        return [
            'commission.amount' => [
                'string',
                'nullable',
            ],
            'commission.date' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'commission.description' => [
                'string',
                'nullable',
            ],
            'commission.commission_rate' => [
                'numeric',
                'nullable',
            ],
            'commission.driver_id' => [
                'integer',
                'exists:drivers,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['driver'] = Driver::pluck('name', 'id')->toArray();
    }
}

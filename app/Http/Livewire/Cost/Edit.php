<?php

namespace App\Http\Livewire\Cost;

use App\Models\Cost;
use App\Models\Vehicle;
use Livewire\Component;

class Edit extends Component
{
    public Cost $cost;

    public array $listsForFields = [];

    public function mount(Cost $cost)
    {
        $this->cost = $cost;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.cost.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->cost->save();

        return redirect()->route('admin.costs.index');
    }

    protected function rules(): array
    {
        return [
            'cost.item_type' => [
                'string',
                'required',
            ],
            'cost.cost' => [
                'numeric',
                'nullable',
            ],
            'cost.effective_date' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
            'cost.end_date' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
            'cost.description' => [
                'string',
                'nullable',
            ],
            'cost.vehicle_id' => [
                'integer',
                'exists:vehicles,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['vehicle'] = Vehicle::pluck('vehicle_number', 'id')->toArray();
    }
}

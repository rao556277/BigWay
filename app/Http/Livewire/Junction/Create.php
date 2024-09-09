<?php

namespace App\Http\Livewire\Junction;

use App\Models\Junction;
use App\Models\Location;
use Livewire\Component;

class Create extends Component
{
    public Junction $junction;

    public array $listsForFields = [];

    public function mount(Junction $junction)
    {
        $this->junction = $junction;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.junction.create');
    }

    public function submit()
    {
        $this->validate();

        $this->junction->save();

        return redirect()->route('admin.junctions.index');
    }

    protected function rules(): array
    {
        return [
            'junction.junction_name' => [
                'string',
                'nullable',
            ],
            'junction.arrival_time' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'junction.departure_time' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'junction.distance_from_last_location' => [
                'numeric',
                'nullable',
            ],
            'junction.location_id' => [
                'integer',
                'exists:locations,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['location'] = Location::pluck('user', 'id')->toArray();
    }
}

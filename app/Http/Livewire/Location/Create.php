<?php

namespace App\Http\Livewire\Location;

use App\Models\Location;
use Livewire\Component;

class Create extends Component
{
    public Location $location;

    public function mount(Location $location)
    {
        $this->location = $location;
    }

    public function render()
    {
        return view('livewire.location.create');
    }

    public function submit()
    {
        $this->validate();

        $this->location->save();

        return redirect()->route('admin.locations.index');
    }

    protected function rules(): array
    {
        return [
            'location.user' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'location.latitude' => [
                'numeric',
                'required',
            ],
            'location.longitude' => [
                'numeric',
                'required',
            ],
            'location.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}

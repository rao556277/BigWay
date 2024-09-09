<?php

namespace App\Http\Livewire\Vehicletype;

use App\Models\Vehicletype;
use Livewire\Component;

class Edit extends Component
{
    public Vehicletype $vehicletype;

    public function mount(Vehicletype $vehicletype)
    {
        $this->vehicletype = $vehicletype;
    }

    public function render()
    {
        return view('livewire.vehicletype.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->vehicletype->save();

        return redirect()->route('admin.vehicletypes.index');
    }

    protected function rules(): array
    {
        return [
            'vehicletype.name' => [
                'string',
                'required',
            ],
            'vehicletype.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}

<?php

namespace App\Http\Livewire\Vehicle;

use App\Models\Caretaker;
use App\Models\Driver;
use App\Models\Route;
use App\Models\Vehicle;
use App\Models\Vehicletype;
use Livewire\Component;

class Create extends Component
{
    public Vehicle $vehicle;

    public array $caretaker = [];

    public array $vehicle_type = [];

    public array $listsForFields = [];

    public function mount(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.vehicle.create');
    }

    public function submit()
    {
        $this->validate();

        $this->vehicle->save();
        $this->vehicle->caretaker()->sync($this->caretaker);
        $this->vehicle->vehicleType()->sync($this->vehicle_type);

        return redirect()->route('admin.vehicles.index');
    }

    protected function rules(): array
    {
        return [
            'vehicle.vehicle_number' => [
                'string',
                'required',
            ],
            'vehicle.capacity' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'caretaker' => [
                'array',
            ],
            'caretaker.*.id' => [
                'integer',
                'exists:caretakers,id',
            ],
            'vehicle.driver_id' => [
                'integer',
                'exists:drivers,id',
                'nullable',
            ],
            'vehicle.route_id' => [
                'integer',
                'exists:routes,id',
                'nullable',
            ],
            'vehicle_type' => [
                'array',
            ],
            'vehicle_type.*.id' => [
                'integer',
                'exists:vehicletypes,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['caretaker']    = Caretaker::pluck('name', 'id')->toArray();
        $this->listsForFields['driver']       = Driver::pluck('name', 'id')->toArray();
        $this->listsForFields['route']        = Route::pluck('route_name', 'id')->toArray();
        $this->listsForFields['vehicle_type'] = Vehicletype::pluck('name', 'id')->toArray();
    }
}

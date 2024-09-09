<?php

namespace App\Http\Livewire\RouteHistory;

use App\Models\Route;
use App\Models\RouteHistory;
use App\Models\Vehicletype;
use App\Models\Vendor;
use Livewire\Component;

class Create extends Component
{
    public array $route = [];

    public array $vendor = [];

    public array $vehicle_type = [];

    public array $listsForFields = [];

    public RouteHistory $routeHistory;

    public function mount(RouteHistory $routeHistory)
    {
        $this->routeHistory = $routeHistory;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.route-history.create');
    }

    public function submit()
    {
        $this->validate();

        $this->routeHistory->save();
        $this->routeHistory->vendor()->sync($this->vendor);
        $this->routeHistory->vehicleType()->sync($this->vehicle_type);
        $this->routeHistory->route()->sync($this->route);

        return redirect()->route('admin.route-histories.index');
    }

    protected function rules(): array
    {
        return [
            'routeHistory.vehicle' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'routeHistory.start_time' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'routeHistory.end_time' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'routeHistory.distance_travelled' => [
                'numeric',
                'nullable',
            ],
            'vendor' => [
                'array',
            ],
            'vendor.*.id' => [
                'integer',
                'exists:vendors,id',
            ],
            'vehicle_type' => [
                'array',
            ],
            'vehicle_type.*.id' => [
                'integer',
                'exists:vehicletypes,id',
            ],
            'route' => [
                'array',
            ],
            'route.*.id' => [
                'integer',
                'exists:routes,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['vendor']       = Vendor::pluck('name', 'id')->toArray();
        $this->listsForFields['vehicle_type'] = Vehicletype::pluck('name', 'id')->toArray();
        $this->listsForFields['route']        = Route::pluck('route_name', 'id')->toArray();
    }
}

<?php

namespace App\Http\Livewire\Vehicle;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Vehicle;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithSorting, WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Vehicle())->orderable;
    }

    public function render()
    {
        $query = Vehicle::with(['caretaker', 'createdBy', 'updatedBy', 'driver', 'route', 'vehicleType'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $vehicles = $query->paginate($this->perPage);

        return view('livewire.vehicle.index', compact('query', 'vehicles'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('vehicle_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Vehicle::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Vehicle $vehicle)
    {
        abort_if(Gate::denies('vehicle_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicle->delete();
    }
}

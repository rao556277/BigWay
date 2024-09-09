<?php

namespace App\Http\Livewire\Route;

use App\Models\Route;
use Livewire\Component;

class Edit extends Component
{
    public Route $route;

    public function mount(Route $route)
    {
        $this->route = $route;
    }

    public function render()
    {
        return view('livewire.route.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->route->save();

        return redirect()->route('admin.routes.index');
    }

    protected function rules(): array
    {
        return [
            'route.route_name' => [
                'string',
                'nullable',
            ],
            'route.start_location_type' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'route.start_location' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'route.end_location_type' => [
                'string',
                'nullable',
            ],
            'route.end_location' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'route.total_distance' => [
                'numeric',
                'nullable',
            ],
            'route.estimated_time' => [
                'string',
                'nullable',
            ],
        ];
    }
}

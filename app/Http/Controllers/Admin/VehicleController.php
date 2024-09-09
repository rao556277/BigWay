<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Vehicle;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VehicleController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('vehicle_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vehicle.index');
    }

    public function create()
    {
        abort_if(Gate::denies('vehicle_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vehicle.create');
    }

    public function edit(Vehicle $vehicle)
    {
        abort_if(Gate::denies('vehicle_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vehicle.edit', compact('vehicle'));
    }

    public function show(Vehicle $vehicle)
    {
        abort_if(Gate::denies('vehicle_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicle->load('caretaker', 'createdBy', 'updatedBy', 'driver', 'route', 'vehicleType');

        return view('admin.vehicle.show', compact('vehicle'));
    }

    public function __construct()
    {
        $this->csvImportModel = Vehicle::class;
    }
}

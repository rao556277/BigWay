<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Http\Resources\Admin\VehicleResource;
use App\Models\Vehicle;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VehicleApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('vehicle_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VehicleResource(Vehicle::with(['caretaker', 'createdBy', 'updatedBy', 'driver', 'route', 'vehicleType'])->get());
    }

    public function store(StoreVehicleRequest $request)
    {
        $vehicle = Vehicle::create($request->validated());
        $vehicle->caretaker()->sync($request->input('caretaker', []));
        $vehicle->vehicleType()->sync($request->input('vehicleType', []));

        return (new VehicleResource($vehicle))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Vehicle $vehicle)
    {
        abort_if(Gate::denies('vehicle_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VehicleResource($vehicle->load(['caretaker', 'createdBy', 'updatedBy', 'driver', 'route', 'vehicleType']));
    }

    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->update($request->validated());
        $vehicle->caretaker()->sync($request->input('caretaker', []));
        $vehicle->vehicleType()->sync($request->input('vehicleType', []));

        return (new VehicleResource($vehicle))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Vehicle $vehicle)
    {
        abort_if(Gate::denies('vehicle_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicle->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

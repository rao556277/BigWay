<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVehicletypeRequest;
use App\Http\Requests\UpdateVehicletypeRequest;
use App\Http\Resources\Admin\VehicletypeResource;
use App\Models\Vehicletype;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VehicletypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('vehicletype_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VehicletypeResource(Vehicletype::with(['createdBy', 'updatedBy'])->get());
    }

    public function store(StoreVehicletypeRequest $request)
    {
        $vehicletype = Vehicletype::create($request->validated());

        return (new VehicletypeResource($vehicletype))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Vehicletype $vehicletype)
    {
        abort_if(Gate::denies('vehicletype_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VehicletypeResource($vehicletype->load(['createdBy', 'updatedBy']));
    }

    public function update(UpdateVehicletypeRequest $request, Vehicletype $vehicletype)
    {
        $vehicletype->update($request->validated());

        return (new VehicletypeResource($vehicletype))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Vehicletype $vehicletype)
    {
        abort_if(Gate::denies('vehicletype_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicletype->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

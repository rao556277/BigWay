<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJunctionRequest;
use App\Http\Requests\UpdateJunctionRequest;
use App\Http\Resources\Admin\JunctionResource;
use App\Models\Junction;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JunctionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('junction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JunctionResource(Junction::with(['location'])->get());
    }

    public function store(StoreJunctionRequest $request)
    {
        $junction = Junction::create($request->validated());

        return (new JunctionResource($junction))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Junction $junction)
    {
        abort_if(Gate::denies('junction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JunctionResource($junction->load(['location']));
    }

    public function update(UpdateJunctionRequest $request, Junction $junction)
    {
        $junction->update($request->validated());

        return (new JunctionResource($junction))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Junction $junction)
    {
        abort_if(Gate::denies('junction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $junction->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

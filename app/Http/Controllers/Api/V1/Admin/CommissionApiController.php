<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommissionRequest;
use App\Http\Requests\UpdateCommissionRequest;
use App\Http\Resources\Admin\CommissionResource;
use App\Models\Commission;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommissionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('commission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CommissionResource(Commission::with(['createdBy', 'updatedBy', 'driver'])->get());
    }

    public function store(StoreCommissionRequest $request)
    {
        $commission = Commission::create($request->validated());

        return (new CommissionResource($commission))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Commission $commission)
    {
        abort_if(Gate::denies('commission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CommissionResource($commission->load(['createdBy', 'updatedBy', 'driver']));
    }

    public function update(UpdateCommissionRequest $request, Commission $commission)
    {
        $commission->update($request->validated());

        return (new CommissionResource($commission))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Commission $commission)
    {
        abort_if(Gate::denies('commission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commission->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

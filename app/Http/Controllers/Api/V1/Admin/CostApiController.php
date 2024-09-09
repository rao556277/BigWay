<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCostRequest;
use App\Http\Requests\UpdateCostRequest;
use App\Http\Resources\Admin\CostResource;
use App\Models\Cost;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CostApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cost_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CostResource(Cost::with(['createdBy', 'updatedBy', 'vehicle'])->get());
    }

    public function store(StoreCostRequest $request)
    {
        $cost = Cost::create($request->validated());

        return (new CostResource($cost))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Cost $cost)
    {
        abort_if(Gate::denies('cost_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CostResource($cost->load(['createdBy', 'updatedBy', 'vehicle']));
    }

    public function update(UpdateCostRequest $request, Cost $cost)
    {
        $cost->update($request->validated());

        return (new CostResource($cost))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Cost $cost)
    {
        abort_if(Gate::denies('cost_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cost->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

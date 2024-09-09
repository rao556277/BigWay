<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRouteHistoryRequest;
use App\Http\Requests\UpdateRouteHistoryRequest;
use App\Http\Resources\Admin\RouteHistoryResource;
use App\Models\RouteHistory;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RouteHistoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('route_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RouteHistoryResource(RouteHistory::with(['vendor', 'vehicleType', 'route', 'createdBy', 'updatedBy'])->get());
    }

    public function store(StoreRouteHistoryRequest $request)
    {
        $routeHistory = RouteHistory::create($request->validated());
        $routeHistory->vendor()->sync($request->input('vendor', []));
        $routeHistory->vehicleType()->sync($request->input('vehicleType', []));
        $routeHistory->route()->sync($request->input('route', []));

        return (new RouteHistoryResource($routeHistory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RouteHistory $routeHistory)
    {
        abort_if(Gate::denies('route_history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RouteHistoryResource($routeHistory->load(['vendor', 'vehicleType', 'route', 'createdBy', 'updatedBy']));
    }

    public function update(UpdateRouteHistoryRequest $request, RouteHistory $routeHistory)
    {
        $routeHistory->update($request->validated());
        $routeHistory->vendor()->sync($request->input('vendor', []));
        $routeHistory->vehicleType()->sync($request->input('vehicleType', []));
        $routeHistory->route()->sync($request->input('route', []));

        return (new RouteHistoryResource($routeHistory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RouteHistory $routeHistory)
    {
        abort_if(Gate::denies('route_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $routeHistory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

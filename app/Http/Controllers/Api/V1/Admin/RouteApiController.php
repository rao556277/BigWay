<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRouteRequest;
use App\Http\Requests\UpdateRouteRequest;
use App\Http\Resources\Admin\RouteResource;
use App\Models\Route;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RouteApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('route_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RouteResource(Route::with(['createdBy', 'updatedBy'])->get());
    }

    public function store(StoreRouteRequest $request)
    {
        $route = Route::create($request->validated());

        return (new RouteResource($route))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Route $route)
    {
        abort_if(Gate::denies('route_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RouteResource($route->load(['createdBy', 'updatedBy']));
    }

    public function update(UpdateRouteRequest $request, Route $route)
    {
        $route->update($request->validated());

        return (new RouteResource($route))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Route $route)
    {
        abort_if(Gate::denies('route_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $route->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

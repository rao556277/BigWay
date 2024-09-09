<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\RouteHistory;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RouteHistoryController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('route_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.route-history.index');
    }

    public function create()
    {
        abort_if(Gate::denies('route_history_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.route-history.create');
    }

    public function edit(RouteHistory $routeHistory)
    {
        abort_if(Gate::denies('route_history_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.route-history.edit', compact('routeHistory'));
    }

    public function show(RouteHistory $routeHistory)
    {
        abort_if(Gate::denies('route_history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $routeHistory->load('vendor', 'vehicleType', 'route', 'createdBy', 'updatedBy');

        return view('admin.route-history.show', compact('routeHistory'));
    }

    public function __construct()
    {
        $this->csvImportModel = RouteHistory::class;
    }
}

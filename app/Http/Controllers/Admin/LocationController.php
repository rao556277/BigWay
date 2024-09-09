<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Location;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LocationController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('location_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.location.index');
    }

    public function create()
    {
        abort_if(Gate::denies('location_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.location.create');
    }

    public function edit(Location $location)
    {
        abort_if(Gate::denies('location_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.location.edit', compact('location'));
    }

    public function show(Location $location)
    {
        abort_if(Gate::denies('location_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $location->load('createdBy', 'updatedBy');

        return view('admin.location.show', compact('location'));
    }

    public function __construct()
    {
        $this->csvImportModel = Location::class;
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Vehicletype;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VehicletypeController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('vehicletype_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vehicletype.index');
    }

    public function create()
    {
        abort_if(Gate::denies('vehicletype_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vehicletype.create');
    }

    public function edit(Vehicletype $vehicletype)
    {
        abort_if(Gate::denies('vehicletype_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vehicletype.edit', compact('vehicletype'));
    }

    public function show(Vehicletype $vehicletype)
    {
        abort_if(Gate::denies('vehicletype_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicletype->load('createdBy', 'updatedBy');

        return view('admin.vehicletype.show', compact('vehicletype'));
    }

    public function __construct()
    {
        $this->csvImportModel = Vehicletype::class;
    }
}

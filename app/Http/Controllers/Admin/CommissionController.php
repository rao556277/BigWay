<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Commission;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommissionController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('commission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.commission.index');
    }

    public function create()
    {
        abort_if(Gate::denies('commission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.commission.create');
    }

    public function edit(Commission $commission)
    {
        abort_if(Gate::denies('commission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.commission.edit', compact('commission'));
    }

    public function show(Commission $commission)
    {
        abort_if(Gate::denies('commission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commission->load('createdBy', 'updatedBy', 'driver');

        return view('admin.commission.show', compact('commission'));
    }

    public function __construct()
    {
        $this->csvImportModel = Commission::class;
    }
}

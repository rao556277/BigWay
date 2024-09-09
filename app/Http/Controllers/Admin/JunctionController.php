<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Junction;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JunctionController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('junction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.junction.index');
    }

    public function create()
    {
        abort_if(Gate::denies('junction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.junction.create');
    }

    public function edit(Junction $junction)
    {
        abort_if(Gate::denies('junction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.junction.edit', compact('junction'));
    }

    public function show(Junction $junction)
    {
        abort_if(Gate::denies('junction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $junction->load('location');

        return view('admin.junction.show', compact('junction'));
    }

    public function __construct()
    {
        $this->csvImportModel = Junction::class;
    }
}

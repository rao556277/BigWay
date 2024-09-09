<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Earning;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EarningController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('earning_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.earning.index');
    }

    public function create()
    {
        abort_if(Gate::denies('earning_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.earning.create');
    }

    public function edit(Earning $earning)
    {
        abort_if(Gate::denies('earning_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.earning.edit', compact('earning'));
    }

    public function show(Earning $earning)
    {
        abort_if(Gate::denies('earning_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $earning->load('createdBy', 'updatedBy');

        return view('admin.earning.show', compact('earning'));
    }

    public function __construct()
    {
        $this->csvImportModel = Earning::class;
    }
}

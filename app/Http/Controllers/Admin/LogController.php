<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Log;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LogController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('log_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.log.index');
    }

    public function create()
    {
        abort_if(Gate::denies('log_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.log.create');
    }

    public function edit(Log $log)
    {
        abort_if(Gate::denies('log_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.log.edit', compact('log'));
    }

    public function show(Log $log)
    {
        abort_if(Gate::denies('log_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $log->load('user', 'performedBy', 'createdBy', 'updatedBy');

        return view('admin.log.show', compact('log'));
    }

    public function __construct()
    {
        $this->csvImportModel = Log::class;
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Agreement;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AgreementController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('agreement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agreement.index');
    }

    public function create()
    {
        abort_if(Gate::denies('agreement_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agreement.create');
    }

    public function edit(Agreement $agreement)
    {
        abort_if(Gate::denies('agreement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agreement.edit', compact('agreement'));
    }

    public function show(Agreement $agreement)
    {
        abort_if(Gate::denies('agreement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agreement->load('user', 'createdBy', 'updatedBy');

        return view('admin.agreement.show', compact('agreement'));
    }

    public function __construct()
    {
        $this->csvImportModel = Agreement::class;
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Emergencycontact;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmergencycontactController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('emergencycontact_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.emergencycontact.index');
    }

    public function create()
    {
        abort_if(Gate::denies('emergencycontact_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.emergencycontact.create');
    }

    public function edit(Emergencycontact $emergencycontact)
    {
        abort_if(Gate::denies('emergencycontact_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.emergencycontact.edit', compact('emergencycontact'));
    }

    public function show(Emergencycontact $emergencycontact)
    {
        abort_if(Gate::denies('emergencycontact_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emergencycontact->load('createdBy', 'updatedBy', 'student');

        return view('admin.emergencycontact.show', compact('emergencycontact'));
    }

    public function __construct()
    {
        $this->csvImportModel = Emergencycontact::class;
    }
}

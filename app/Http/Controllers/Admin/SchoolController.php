<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\School;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SchoolController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('school_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.school.index');
    }

    public function create()
    {
        abort_if(Gate::denies('school_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.school.create');
    }

    public function edit(School $school)
    {
        abort_if(Gate::denies('school_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.school.edit', compact('school'));
    }

    public function show(School $school)
    {
        abort_if(Gate::denies('school_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $school->load('createdBy', 'updatedBy', 'location', 'user');

        return view('admin.school.show', compact('school'));
    }

    public function __construct()
    {
        $this->csvImportModel = School::class;
    }
}

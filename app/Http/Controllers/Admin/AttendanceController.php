<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Attendance;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AttendanceController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('attendance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.attendance.index');
    }

    public function create()
    {
        abort_if(Gate::denies('attendance_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.attendance.create');
    }

    public function edit(Attendance $attendance)
    {
        abort_if(Gate::denies('attendance_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.attendance.edit', compact('attendance'));
    }

    public function show(Attendance $attendance)
    {
        abort_if(Gate::denies('attendance_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attendance->load('createdBy', 'updatedBy', 'student');

        return view('admin.attendance.show', compact('attendance'));
    }

    public function __construct()
    {
        $this->csvImportModel = Attendance::class;
    }
}

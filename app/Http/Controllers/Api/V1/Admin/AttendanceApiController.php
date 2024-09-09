<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Http\Resources\Admin\AttendanceResource;
use App\Models\Attendance;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AttendanceApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('attendance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AttendanceResource(Attendance::with(['createdBy', 'updatedBy', 'student'])->get());
    }

    public function store(StoreAttendanceRequest $request)
    {
        $attendance = Attendance::create($request->validated());

        return (new AttendanceResource($attendance))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Attendance $attendance)
    {
        abort_if(Gate::denies('attendance_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AttendanceResource($attendance->load(['createdBy', 'updatedBy', 'student']));
    }

    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        $attendance->update($request->validated());

        return (new AttendanceResource($attendance))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Attendance $attendance)
    {
        abort_if(Gate::denies('attendance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attendance->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

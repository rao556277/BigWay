<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\Admin\StudentResource;
use App\Models\Student;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('student_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StudentResource(Student::with(['vehicle', 'createdBy', 'updatedBy', 'school'])->get());
    }

    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->validated());
        $student->vehicle()->sync($request->input('vehicle', []));
        if ($request->input('student_profile_picture', false)) {
            $student->addMedia(storage_path('tmp/uploads/' . basename($request->input('student_profile_picture'))))->toMediaCollection('student_profile_picture');
        }

        return (new StudentResource($student))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Student $student)
    {
        abort_if(Gate::denies('student_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StudentResource($student->load(['vehicle', 'createdBy', 'updatedBy', 'school']));
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());
        $student->vehicle()->sync($request->input('vehicle', []));
        if ($request->input('student_profile_picture', false)) {
            if (! $student->student_profile_picture || $request->input('student_profile_picture') !== $student->student_profile_picture->file_name) {
                if ($student->student_profile_picture) {
                    $student->student_profile_picture->delete();
                }
                $student->addMedia(storage_path('tmp/uploads/' . basename($request->input('student_profile_picture'))))->toMediaCollection('student_profile_picture');
            }
        } elseif ($student->student_profile_picture) {
            $student->student_profile_picture->delete();
        }

        return (new StudentResource($student))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Student $student)
    {
        abort_if(Gate::denies('student_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

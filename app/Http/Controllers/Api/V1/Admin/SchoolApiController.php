<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;
use App\Http\Resources\Admin\SchoolResource;
use App\Models\School;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SchoolApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('school_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SchoolResource(School::with(['createdBy', 'updatedBy', 'location', 'user'])->get());
    }

    public function store(StoreSchoolRequest $request)
    {
        $school = School::create($request->validated());

        return (new SchoolResource($school))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(School $school)
    {
        abort_if(Gate::denies('school_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SchoolResource($school->load(['createdBy', 'updatedBy', 'location', 'user']));
    }

    public function update(UpdateSchoolRequest $request, School $school)
    {
        $school->update($request->validated());

        return (new SchoolResource($school))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(School $school)
    {
        abort_if(Gate::denies('school_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $school->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

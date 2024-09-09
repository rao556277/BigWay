<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmergencycontactRequest;
use App\Http\Requests\UpdateEmergencycontactRequest;
use App\Http\Resources\Admin\EmergencycontactResource;
use App\Models\Emergencycontact;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmergencycontactApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('emergencycontact_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmergencycontactResource(Emergencycontact::with(['createdBy', 'updatedBy', 'student'])->get());
    }

    public function store(StoreEmergencycontactRequest $request)
    {
        $emergencycontact = Emergencycontact::create($request->validated());

        return (new EmergencycontactResource($emergencycontact))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Emergencycontact $emergencycontact)
    {
        abort_if(Gate::denies('emergencycontact_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmergencycontactResource($emergencycontact->load(['createdBy', 'updatedBy', 'student']));
    }

    public function update(UpdateEmergencycontactRequest $request, Emergencycontact $emergencycontact)
    {
        $emergencycontact->update($request->validated());

        return (new EmergencycontactResource($emergencycontact))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Emergencycontact $emergencycontact)
    {
        abort_if(Gate::denies('emergencycontact_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emergencycontact->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

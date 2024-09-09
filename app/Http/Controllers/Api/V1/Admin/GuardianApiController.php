<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreGuardianRequest;
use App\Http\Requests\UpdateGuardianRequest;
use App\Http\Resources\Admin\GuardianResource;
use App\Models\Guardian;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GuardianApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('guardian_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuardianResource(Guardian::with(['createdBy', 'updatedBy'])->get());
    }

    public function store(StoreGuardianRequest $request)
    {
        $guardian = Guardian::create($request->validated());

        if ($request->input('guardian_profile_picture', false)) {
            $guardian->addMedia(storage_path('tmp/uploads/' . basename($request->input('guardian_profile_picture'))))->toMediaCollection('guardian_profile_picture');
        }

        return (new GuardianResource($guardian))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Guardian $guardian)
    {
        abort_if(Gate::denies('guardian_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuardianResource($guardian->load(['createdBy', 'updatedBy']));
    }

    public function update(UpdateGuardianRequest $request, Guardian $guardian)
    {
        $guardian->update($request->validated());

        if ($request->input('guardian_profile_picture', false)) {
            if (! $guardian->guardian_profile_picture || $request->input('guardian_profile_picture') !== $guardian->guardian_profile_picture->file_name) {
                if ($guardian->guardian_profile_picture) {
                    $guardian->guardian_profile_picture->delete();
                }
                $guardian->addMedia(storage_path('tmp/uploads/' . basename($request->input('guardian_profile_picture'))))->toMediaCollection('guardian_profile_picture');
            }
        } elseif ($guardian->guardian_profile_picture) {
            $guardian->guardian_profile_picture->delete();
        }

        return (new GuardianResource($guardian))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Guardian $guardian)
    {
        abort_if(Gate::denies('guardian_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guardian->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

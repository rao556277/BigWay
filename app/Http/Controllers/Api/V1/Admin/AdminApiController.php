<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Resources\Admin\AdminResource;
use App\Models\Admin;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AdminResource(Admin::with(['createdBy', 'updatedBy'])->get());
    }

    public function store(StoreAdminRequest $request)
    {
        $admin = Admin::create($request->validated());

        if ($request->input('admin_profile_picture', false)) {
            $admin->addMedia(storage_path('tmp/uploads/' . basename($request->input('admin_profile_picture'))))->toMediaCollection('admin_profile_picture');
        }

        return (new AdminResource($admin))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Admin $admin)
    {
        abort_if(Gate::denies('admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AdminResource($admin->load(['createdBy', 'updatedBy']));
    }

    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $admin->update($request->validated());

        if ($request->input('admin_profile_picture', false)) {
            if (! $admin->admin_profile_picture || $request->input('admin_profile_picture') !== $admin->admin_profile_picture->file_name) {
                if ($admin->admin_profile_picture) {
                    $admin->admin_profile_picture->delete();
                }
                $admin->addMedia(storage_path('tmp/uploads/' . basename($request->input('admin_profile_picture'))))->toMediaCollection('admin_profile_picture');
            }
        } elseif ($admin->admin_profile_picture) {
            $admin->admin_profile_picture->delete();
        }

        return (new AdminResource($admin))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Admin $admin)
    {
        abort_if(Gate::denies('admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $admin->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreDriverRequest;
use App\Http\Requests\UpdateDriverRequest;
use App\Http\Resources\Admin\DriverResource;
use App\Models\Driver;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DriverApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('driver_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DriverResource(Driver::with(['createdBy', 'updatedBy'])->get());
    }

    public function store(StoreDriverRequest $request)
    {
        $driver = Driver::create($request->validated());

        if ($request->input('driver_profile_picture', false)) {
            $driver->addMedia(storage_path('tmp/uploads/' . basename($request->input('driver_profile_picture'))))->toMediaCollection('driver_profile_picture');
        }

        return (new DriverResource($driver))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Driver $driver)
    {
        abort_if(Gate::denies('driver_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DriverResource($driver->load(['createdBy', 'updatedBy']));
    }

    public function update(UpdateDriverRequest $request, Driver $driver)
    {
        $driver->update($request->validated());

        if ($request->input('driver_profile_picture', false)) {
            if (! $driver->driver_profile_picture || $request->input('driver_profile_picture') !== $driver->driver_profile_picture->file_name) {
                if ($driver->driver_profile_picture) {
                    $driver->driver_profile_picture->delete();
                }
                $driver->addMedia(storage_path('tmp/uploads/' . basename($request->input('driver_profile_picture'))))->toMediaCollection('driver_profile_picture');
            }
        } elseif ($driver->driver_profile_picture) {
            $driver->driver_profile_picture->delete();
        }

        return (new DriverResource($driver))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Driver $driver)
    {
        abort_if(Gate::denies('driver_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $driver->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

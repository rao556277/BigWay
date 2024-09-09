<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreVendorRequest;
use App\Http\Requests\UpdateVendorRequest;
use App\Http\Resources\Admin\VendorResource;
use App\Models\Vendor;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VendorApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('vendor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VendorResource(Vendor::with(['user', 'createdBy', 'updatedBy'])->get());
    }

    public function store(StoreVendorRequest $request)
    {
        $vendor = Vendor::create($request->validated());

        if ($request->input('vendor_profile_picture', false)) {
            $vendor->addMedia(storage_path('tmp/uploads/' . basename($request->input('vendor_profile_picture'))))->toMediaCollection('vendor_profile_picture');
        }

        return (new VendorResource($vendor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Vendor $vendor)
    {
        abort_if(Gate::denies('vendor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VendorResource($vendor->load(['user', 'createdBy', 'updatedBy']));
    }

    public function update(UpdateVendorRequest $request, Vendor $vendor)
    {
        $vendor->update($request->validated());

        if ($request->input('vendor_profile_picture', false)) {
            if (! $vendor->vendor_profile_picture || $request->input('vendor_profile_picture') !== $vendor->vendor_profile_picture->file_name) {
                if ($vendor->vendor_profile_picture) {
                    $vendor->vendor_profile_picture->delete();
                }
                $vendor->addMedia(storage_path('tmp/uploads/' . basename($request->input('vendor_profile_picture'))))->toMediaCollection('vendor_profile_picture');
            }
        } elseif ($vendor->vendor_profile_picture) {
            $vendor->vendor_profile_picture->delete();
        }

        return (new VendorResource($vendor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Vendor $vendor)
    {
        abort_if(Gate::denies('vendor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

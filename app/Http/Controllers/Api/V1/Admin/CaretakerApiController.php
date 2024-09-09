<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreCaretakerRequest;
use App\Http\Requests\UpdateCaretakerRequest;
use App\Http\Resources\Admin\CaretakerResource;
use App\Models\Caretaker;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CaretakerApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('caretaker_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CaretakerResource(Caretaker::with(['vehicleType', 'emergencyContact', 'createdBy', 'updatedBy'])->get());
    }

    public function store(StoreCaretakerRequest $request)
    {
        $caretaker = Caretaker::create($request->validated());

        foreach ($request->input('caretaker_profile_picture', []) as $file) {
            $caretaker->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('caretaker_profile_picture');
        }

        return (new CaretakerResource($caretaker))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Caretaker $caretaker)
    {
        abort_if(Gate::denies('caretaker_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CaretakerResource($caretaker->load(['vehicleType', 'emergencyContact', 'createdBy', 'updatedBy']));
    }

    public function update(UpdateCaretakerRequest $request, Caretaker $caretaker)
    {
        $caretaker->update($request->validated());

        if (count($caretaker->caretaker_profile_picture) > 0) {
            foreach ($caretaker->caretaker_profile_picture as $media) {
                if (! in_array($media->file_name, $request->input('caretaker_profile_picture', []))) {
                    $media->delete();
                }
            }
        }
        $media = $caretaker->caretaker_profile_picture->pluck('file_name')->toArray();
        foreach ($request->input('caretaker_profile_picture', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $caretaker->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('caretaker_profile_picture');
            }
        }

        return (new CaretakerResource($caretaker))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Caretaker $caretaker)
    {
        abort_if(Gate::denies('caretaker_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caretaker->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

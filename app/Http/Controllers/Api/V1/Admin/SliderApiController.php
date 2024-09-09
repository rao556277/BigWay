<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Http\Resources\Admin\SliderResource;
use App\Models\Slider;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SliderApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('slider_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SliderResource(Slider::with(['createdBy', 'updatedBy'])->get());
    }

    public function store(StoreSliderRequest $request)
    {
        $slider = Slider::create($request->validated());

        return (new SliderResource($slider))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Slider $slider)
    {
        abort_if(Gate::denies('slider_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SliderResource($slider->load(['createdBy', 'updatedBy']));
    }

    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        $slider->update($request->validated());

        return (new SliderResource($slider))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Slider $slider)
    {
        abort_if(Gate::denies('slider_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slider->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

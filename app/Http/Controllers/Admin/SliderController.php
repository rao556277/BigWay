<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Slider;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SliderController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('slider_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.slider.index');
    }

    public function create()
    {
        abort_if(Gate::denies('slider_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.slider.create');
    }

    public function edit(Slider $slider)
    {
        abort_if(Gate::denies('slider_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.slider.edit', compact('slider'));
    }

    public function show(Slider $slider)
    {
        abort_if(Gate::denies('slider_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slider->load('createdBy', 'updatedBy');

        return view('admin.slider.show', compact('slider'));
    }

    public function __construct()
    {
        $this->csvImportModel = Slider::class;
    }
}

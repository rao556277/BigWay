<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Driver;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DriverController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('driver_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.driver.index');
    }

    public function create()
    {
        abort_if(Gate::denies('driver_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.driver.create');
    }

    public function edit(Driver $driver)
    {
        abort_if(Gate::denies('driver_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.driver.edit', compact('driver'));
    }

    public function show(Driver $driver)
    {
        abort_if(Gate::denies('driver_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $driver->load('createdBy', 'updatedBy');

        return view('admin.driver.show', compact('driver'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['driver_create', 'driver_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }
        if (request()->has('max_width') || request()->has('max_height')) {
            $this->validate(request(), [
                'file' => sprintf(
                    'image|dimensions:max_width=%s,max_height=%s',
                    request()->input('max_width', 100000),
                    request()->input('max_height', 100000)
                ),
            ]);
        }

        $model                     = new Driver();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }

    public function __construct()
    {
        $this->csvImportModel = Driver::class;
    }
}

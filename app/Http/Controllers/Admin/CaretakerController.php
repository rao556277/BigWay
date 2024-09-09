<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Caretaker;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CaretakerController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('caretaker_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.caretaker.index');
    }

    public function create()
    {
        abort_if(Gate::denies('caretaker_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.caretaker.create');
    }

    public function edit(Caretaker $caretaker)
    {
        abort_if(Gate::denies('caretaker_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.caretaker.edit', compact('caretaker'));
    }

    public function show(Caretaker $caretaker)
    {
        abort_if(Gate::denies('caretaker_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caretaker->load('vehicleType', 'emergencyContact', 'createdBy', 'updatedBy');

        return view('admin.caretaker.show', compact('caretaker'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['caretaker_create', 'caretaker_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

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

        $model                     = new Caretaker();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }

    public function __construct()
    {
        $this->csvImportModel = Caretaker::class;
    }
}

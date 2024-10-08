<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Admin;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.admin.index');
    }

    public function create()
    {
        abort_if(Gate::denies('admin_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.admin.create');
    }

    public function edit(Admin $admin)
    {
        abort_if(Gate::denies('admin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.admin.edit', compact('admin'));
    }

    public function show(Admin $admin)
    {
        abort_if(Gate::denies('admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $admin->load('createdBy', 'updatedBy');

        return view('admin.admin.show', compact('admin'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['admin_create', 'admin_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

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

        $model                     = new Admin();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }

    public function __construct()
    {
        $this->csvImportModel = Admin::class;
    }
}

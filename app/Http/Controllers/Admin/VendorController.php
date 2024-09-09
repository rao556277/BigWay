<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Vendor;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VendorController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('vendor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vendor.index');
    }

    public function create()
    {
        abort_if(Gate::denies('vendor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vendor.create');
    }

    public function edit(Vendor $vendor)
    {
        abort_if(Gate::denies('vendor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vendor.edit', compact('vendor'));
    }

    public function show(Vendor $vendor)
    {
        abort_if(Gate::denies('vendor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendor->load('user', 'createdBy', 'updatedBy');

        return view('admin.vendor.show', compact('vendor'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['vendor_create', 'vendor_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

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

        $model                     = new Vendor();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }

    public function __construct()
    {
        $this->csvImportModel = Vendor::class;
    }
}

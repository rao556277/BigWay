<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Package;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PackageController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('package_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.package.index');
    }

    public function create()
    {
        abort_if(Gate::denies('package_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.package.create');
    }

    public function edit(Package $package)
    {
        abort_if(Gate::denies('package_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.package.edit', compact('package'));
    }

    public function show(Package $package)
    {
        abort_if(Gate::denies('package_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $package->load('user', 'createdBy', 'updatedBy');

        return view('admin.package.show', compact('package'));
    }

    public function __construct()
    {
        $this->csvImportModel = Package::class;
    }
}

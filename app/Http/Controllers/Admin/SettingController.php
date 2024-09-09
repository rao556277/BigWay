<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Setting;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SettingController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.setting.index');
    }

    public function create()
    {
        abort_if(Gate::denies('setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.setting.create');
    }

    public function edit(Setting $setting)
    {
        abort_if(Gate::denies('setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.setting.edit', compact('setting'));
    }

    public function show(Setting $setting)
    {
        abort_if(Gate::denies('setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setting->load('createdBy', 'updatedBy');

        return view('admin.setting.show', compact('setting'));
    }

    public function __construct()
    {
        $this->csvImportModel = Setting::class;
    }
}

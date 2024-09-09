@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.admin.title_singular') }}:
                    {{ trans('cruds.admin.fields.id') }}
                    {{ $admin->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.admin.fields.id') }}
                            </th>
                            <td>
                                {{ $admin->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.admin.fields.name') }}
                            </th>
                            <td>
                                {{ $admin->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.admin.fields.permissions') }}
                            </th>
                            <td>
                                {{ $admin->permissions }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.admin.fields.role') }}
                            </th>
                            <td>
                                {{ $admin->role }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.admin.fields.blood_group') }}
                            </th>
                            <td>
                                {{ $admin->blood_group_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.admin.fields.profile_picture') }}
                            </th>
                            <td>
                                @foreach($admin->profile_picture as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('admin_edit')
                    <a href="{{ route('admin.admins.edit', $admin) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.admins.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
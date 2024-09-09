@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.package.title_singular') }}:
                    {{ trans('cruds.package.fields.id') }}
                    {{ $package->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.package.fields.id') }}
                            </th>
                            <td>
                                {{ $package->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.package.fields.package_name') }}
                            </th>
                            <td>
                                {{ $package->package_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.package.fields.price') }}
                            </th>
                            <td>
                                {{ $package->price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.package.fields.duration') }}
                            </th>
                            <td>
                                {{ $package->duration }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.package.fields.package_type') }}
                            </th>
                            <td>
                                {{ $package->package_type }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.package.fields.user') }}
                            </th>
                            <td>
                                @if($package->user)
                                    <span class="badge badge-relationship">{{ $package->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.package.fields.description') }}
                            </th>
                            <td>
                                {{ $package->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('package_edit')
                    <a href="{{ route('admin.packages.edit', $package) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
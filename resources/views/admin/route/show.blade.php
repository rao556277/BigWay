@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.route.title_singular') }}:
                    {{ trans('cruds.route.fields.id') }}
                    {{ $route->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.route.fields.id') }}
                            </th>
                            <td>
                                {{ $route->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.route.fields.route_name') }}
                            </th>
                            <td>
                                {{ $route->route_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.route.fields.start_location_type') }}
                            </th>
                            <td>
                                {{ $route->start_location_type }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.route.fields.start_location') }}
                            </th>
                            <td>
                                {{ $route->start_location }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.route.fields.end_location_type') }}
                            </th>
                            <td>
                                {{ $route->end_location_type }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.route.fields.end_location') }}
                            </th>
                            <td>
                                {{ $route->end_location }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.route.fields.total_distance') }}
                            </th>
                            <td>
                                {{ $route->total_distance }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.route.fields.estimated_time') }}
                            </th>
                            <td>
                                {{ $route->estimated_time }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('route_edit')
                    <a href="{{ route('admin.routes.edit', $route) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.routes.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.routeHistory.title_singular') }}:
                    {{ trans('cruds.routeHistory.fields.id') }}
                    {{ $routeHistory->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.routeHistory.fields.id') }}
                            </th>
                            <td>
                                {{ $routeHistory->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.routeHistory.fields.vehicle') }}
                            </th>
                            <td>
                                {{ $routeHistory->vehicle }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.routeHistory.fields.start_time') }}
                            </th>
                            <td>
                                {{ $routeHistory->start_time }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.routeHistory.fields.end_time') }}
                            </th>
                            <td>
                                {{ $routeHistory->end_time }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.routeHistory.fields.distance_travelled') }}
                            </th>
                            <td>
                                {{ $routeHistory->distance_travelled }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.routeHistory.fields.vendor') }}
                            </th>
                            <td>
                                @foreach($routeHistory->vendor as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.routeHistory.fields.vehicle_type') }}
                            </th>
                            <td>
                                @foreach($routeHistory->vehicleType as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.routeHistory.fields.route') }}
                            </th>
                            <td>
                                @foreach($routeHistory->route as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->route_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('route_history_edit')
                    <a href="{{ route('admin.route-histories.edit', $routeHistory) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.route-histories.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
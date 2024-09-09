@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.vehicle.title_singular') }}:
                    {{ trans('cruds.vehicle.fields.id') }}
                    {{ $vehicle->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.vehicle.fields.id') }}
                            </th>
                            <td>
                                {{ $vehicle->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.vehicle.fields.vehicle_number') }}
                            </th>
                            <td>
                                {{ $vehicle->vehicle_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.vehicle.fields.capacity') }}
                            </th>
                            <td>
                                {{ $vehicle->capacity }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.vehicle.fields.caretaker') }}
                            </th>
                            <td>
                                @foreach($vehicle->caretaker as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.vehicle.fields.driver') }}
                            </th>
                            <td>
                                @if($vehicle->driver)
                                    <span class="badge badge-relationship">{{ $vehicle->driver->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.vehicle.fields.route') }}
                            </th>
                            <td>
                                @if($vehicle->route)
                                    <span class="badge badge-relationship">{{ $vehicle->route->route_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.vehicle.fields.vehicle_type') }}
                            </th>
                            <td>
                                @foreach($vehicle->vehicleType as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('vehicle_edit')
                    <a href="{{ route('admin.vehicles.edit', $vehicle) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.vehicles.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
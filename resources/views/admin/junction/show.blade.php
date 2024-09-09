@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.junction.title_singular') }}:
                    {{ trans('cruds.junction.fields.id') }}
                    {{ $junction->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.junction.fields.id') }}
                            </th>
                            <td>
                                {{ $junction->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.junction.fields.junction_name') }}
                            </th>
                            <td>
                                {{ $junction->junction_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.junction.fields.arrival_time') }}
                            </th>
                            <td>
                                {{ $junction->arrival_time }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.junction.fields.departure_time') }}
                            </th>
                            <td>
                                {{ $junction->departure_time }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.junction.fields.distance_from_last_location') }}
                            </th>
                            <td>
                                {{ $junction->distance_from_last_location }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.junction.fields.location') }}
                            </th>
                            <td>
                                @if($junction->location)
                                    <span class="badge badge-relationship">{{ $junction->location->user ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('junction_edit')
                    <a href="{{ route('admin.junctions.edit', $junction) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.junctions.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
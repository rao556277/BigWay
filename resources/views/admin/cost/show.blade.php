@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.cost.title_singular') }}:
                    {{ trans('cruds.cost.fields.id') }}
                    {{ $cost->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.cost.fields.id') }}
                            </th>
                            <td>
                                {{ $cost->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.cost.fields.item_type') }}
                            </th>
                            <td>
                                {{ $cost->item_type }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.cost.fields.cost') }}
                            </th>
                            <td>
                                {{ $cost->cost }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.cost.fields.effective_date') }}
                            </th>
                            <td>
                                {{ $cost->effective_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.cost.fields.end_date') }}
                            </th>
                            <td>
                                {{ $cost->end_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.cost.fields.description') }}
                            </th>
                            <td>
                                {{ $cost->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.cost.fields.vehicle') }}
                            </th>
                            <td>
                                @if($cost->vehicle)
                                    <span class="badge badge-relationship">{{ $cost->vehicle->vehicle_number ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('cost_edit')
                    <a href="{{ route('admin.costs.edit', $cost) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.costs.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
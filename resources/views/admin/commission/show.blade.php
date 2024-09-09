@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.commission.title_singular') }}:
                    {{ trans('cruds.commission.fields.id') }}
                    {{ $commission->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.commission.fields.id') }}
                            </th>
                            <td>
                                {{ $commission->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.commission.fields.amount') }}
                            </th>
                            <td>
                                {{ $commission->amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.commission.fields.date') }}
                            </th>
                            <td>
                                {{ $commission->date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.commission.fields.description') }}
                            </th>
                            <td>
                                {{ $commission->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.commission.fields.commission_rate') }}
                            </th>
                            <td>
                                {{ $commission->commission_rate }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.commission.fields.driver') }}
                            </th>
                            <td>
                                @if($commission->driver)
                                    <span class="badge badge-relationship">{{ $commission->driver->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('commission_edit')
                    <a href="{{ route('admin.commissions.edit', $commission) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.commissions.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
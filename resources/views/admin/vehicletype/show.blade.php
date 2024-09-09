@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.vehicletype.title_singular') }}:
                    {{ trans('cruds.vehicletype.fields.id') }}
                    {{ $vehicletype->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.vehicletype.fields.id') }}
                            </th>
                            <td>
                                {{ $vehicletype->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.vehicletype.fields.name') }}
                            </th>
                            <td>
                                {{ $vehicletype->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.vehicletype.fields.description') }}
                            </th>
                            <td>
                                {{ $vehicletype->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('vehicletype_edit')
                    <a href="{{ route('admin.vehicletypes.edit', $vehicletype) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.vehicletypes.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
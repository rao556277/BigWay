@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.log.title_singular') }}:
                    {{ trans('cruds.log.fields.id') }}
                    {{ $log->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.log.fields.id') }}
                            </th>
                            <td>
                                {{ $log->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.log.fields.entity_type') }}
                            </th>
                            <td>
                                {{ $log->entity_type }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.log.fields.entity') }}
                            </th>
                            <td>
                                {{ $log->entity }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.log.fields.action') }}
                            </th>
                            <td>
                                {{ $log->action }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.log.fields.timezone') }}
                            </th>
                            <td>
                                {{ $log->timezone }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.log.fields.user') }}
                            </th>
                            <td>
                                @foreach($log->user as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.log.fields.performed_by') }}
                            </th>
                            <td>
                                @if($log->performedBy)
                                    <span class="badge badge-relationship">{{ $log->performedBy->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.log.fields.created_by') }}
                            </th>
                            <td>
                                @if($log->createdBy)
                                    <span class="badge badge-relationship">{{ $log->createdBy->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('log_edit')
                    <a href="{{ route('admin.logs.edit', $log) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.logs.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
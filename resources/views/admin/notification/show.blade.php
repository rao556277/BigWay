@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.notification.title_singular') }}:
                    {{ trans('cruds.notification.fields.id') }}
                    {{ $notification->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.notification.fields.id') }}
                            </th>
                            <td>
                                {{ $notification->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.notification.fields.user') }}
                            </th>
                            <td>
                                {{ $notification->user }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.notification.fields.type') }}
                            </th>
                            <td>
                                {{ $notification->type }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.notification.fields.message') }}
                            </th>
                            <td>
                                {{ $notification->message }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.notification.fields.for') }}
                            </th>
                            <td>
                                @foreach($notification->for as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.notification.fields.for_user') }}
                            </th>
                            <td>
                                {{ $notification->for_user }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('notification_edit')
                    <a href="{{ route('admin.notifications.edit', $notification) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.notifications.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
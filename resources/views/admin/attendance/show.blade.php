@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.attendance.title_singular') }}:
                    {{ trans('cruds.attendance.fields.id') }}
                    {{ $attendance->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.attendance.fields.id') }}
                            </th>
                            <td>
                                {{ $attendance->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.attendance.fields.route') }}
                            </th>
                            <td>
                                {{ $attendance->route }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.attendance.fields.date') }}
                            </th>
                            <td>
                                {{ $attendance->date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.attendance.fields.pickup_time') }}
                            </th>
                            <td>
                                {{ $attendance->pickup_time }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.attendance.fields.dropoff_time') }}
                            </th>
                            <td>
                                {{ $attendance->dropoff_time }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.attendance.fields.student') }}
                            </th>
                            <td>
                                @if($attendance->student)
                                    <span class="badge badge-relationship">{{ $attendance->student->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('attendance_edit')
                    <a href="{{ route('admin.attendances.edit', $attendance) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.attendances.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.school.title_singular') }}:
                    {{ trans('cruds.school.fields.id') }}
                    {{ $school->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.id') }}
                            </th>
                            <td>
                                {{ $school->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.name') }}
                            </th>
                            <td>
                                {{ $school->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.address') }}
                            </th>
                            <td>
                                {{ $school->address }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.contact_number') }}
                            </th>
                            <td>
                                {{ $school->contact_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.location') }}
                            </th>
                            <td>
                                @if($school->location)
                                    <span class="badge badge-relationship">{{ $school->location->latitude ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.user') }}
                            </th>
                            <td>
                                @if($school->user)
                                    <span class="badge badge-relationship">{{ $school->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('school_edit')
                    <a href="{{ route('admin.schools.edit', $school) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.schools.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
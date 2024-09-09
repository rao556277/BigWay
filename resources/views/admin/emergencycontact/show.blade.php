@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.emergencycontact.title_singular') }}:
                    {{ trans('cruds.emergencycontact.fields.id') }}
                    {{ $emergencycontact->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.emergencycontact.fields.id') }}
                            </th>
                            <td>
                                {{ $emergencycontact->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.emergencycontact.fields.name') }}
                            </th>
                            <td>
                                {{ $emergencycontact->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.emergencycontact.fields.relationship') }}
                            </th>
                            <td>
                                {{ $emergencycontact->relationship }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.emergencycontact.fields.contact_1') }}
                            </th>
                            <td>
                                {{ $emergencycontact->contact_1 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.emergencycontact.fields.contact_2') }}
                            </th>
                            <td>
                                {{ $emergencycontact->contact_2 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.emergencycontact.fields.student') }}
                            </th>
                            <td>
                                @if($emergencycontact->student)
                                    <span class="badge badge-relationship">{{ $emergencycontact->student->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('emergencycontact_edit')
                    <a href="{{ route('admin.emergencycontacts.edit', $emergencycontact) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.emergencycontacts.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
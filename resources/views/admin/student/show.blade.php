@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.student.title_singular') }}:
                    {{ trans('cruds.student.fields.id') }}
                    {{ $student->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.student.fields.id') }}
                            </th>
                            <td>
                                {{ $student->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.student.fields.name') }}
                            </th>
                            <td>
                                {{ $student->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.student.fields.dob') }}
                            </th>
                            <td>
                                {{ $student->dob }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.student.fields.location') }}
                            </th>
                            <td>
                                {{ $student->location }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.student.fields.grade') }}
                            </th>
                            <td>
                                {{ $student->grade }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.student.fields.attendance_status') }}
                            </th>
                            <td>
                                {{ $student->attendance_status }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.student.fields.qr_code') }}
                            </th>
                            <td>
                                {{ $student->qr_code }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.student.fields.medical_condition') }}
                            </th>
                            <td>
                                {{ $student->medical_condition }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.student.fields.emergency_medication') }}
                            </th>
                            <td>
                                {{ $student->emergency_medication }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.student.fields.allergies') }}
                            </th>
                            <td>
                                {{ $student->allergies }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.student.fields.blood_group') }}
                            </th>
                            <td>
                                {{ $student->blood_group_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.student.fields.vehicle') }}
                            </th>
                            <td>
                                @foreach($student->vehicle as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->vehicle_number }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.student.fields.profile_picture') }}
                            </th>
                            <td>
                                @foreach($student->profile_picture as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.student.fields.gender') }}
                            </th>
                            <td>
                                {{ $student->gender_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.student.fields.school') }}
                            </th>
                            <td>
                                @if($student->school)
                                    <span class="badge badge-relationship">{{ $student->school->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('student_edit')
                    <a href="{{ route('admin.students.edit', $student) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.caretaker.title_singular') }}:
                    {{ trans('cruds.caretaker.fields.id') }}
                    {{ $caretaker->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.caretaker.fields.id') }}
                            </th>
                            <td>
                                {{ $caretaker->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.caretaker.fields.name') }}
                            </th>
                            <td>
                                {{ $caretaker->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.caretaker.fields.address') }}
                            </th>
                            <td>
                                {{ $caretaker->address }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.caretaker.fields.cnic') }}
                            </th>
                            <td>
                                {{ $caretaker->cnic }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.caretaker.fields.image_url') }}
                            </th>
                            <td>
                                {{ $caretaker->image_url }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.caretaker.fields.medical_condition') }}
                            </th>
                            <td>
                                {{ $caretaker->medical_condition }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.caretaker.fields.emergency_medication') }}
                            </th>
                            <td>
                                {{ $caretaker->emergency_medication }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.caretaker.fields.allergies') }}
                            </th>
                            <td>
                                {{ $caretaker->allergies }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.caretaker.fields.employment_date') }}
                            </th>
                            <td>
                                {{ $caretaker->employment_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.caretaker.fields.date_of_birth') }}
                            </th>
                            <td>
                                {{ $caretaker->date_of_birth }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.caretaker.fields.blood_group') }}
                            </th>
                            <td>
                                {{ $caretaker->blood_group_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.caretaker.fields.vehicle_type') }}
                            </th>
                            <td>
                                @if($caretaker->vehicleType)
                                    <span class="badge badge-relationship">{{ $caretaker->vehicleType->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.caretaker.fields.emergency_contact') }}
                            </th>
                            <td>
                                @if($caretaker->emergencyContact)
                                    <span class="badge badge-relationship">{{ $caretaker->emergencyContact->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.caretaker.fields.profile_picture') }}
                            </th>
                            <td>
                                @foreach($caretaker->profile_picture as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.caretaker.fields.gender') }}
                            </th>
                            <td>
                                {{ $caretaker->gender_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('caretaker_edit')
                    <a href="{{ route('admin.caretakers.edit', $caretaker) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.caretakers.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
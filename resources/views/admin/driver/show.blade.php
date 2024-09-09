@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.driver.title_singular') }}:
                    {{ trans('cruds.driver.fields.id') }}
                    {{ $driver->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.driver.fields.id') }}
                            </th>
                            <td>
                                {{ $driver->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.driver.fields.name') }}
                            </th>
                            <td>
                                {{ $driver->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.driver.fields.license_number') }}
                            </th>
                            <td>
                                {{ $driver->license_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.driver.fields.address') }}
                            </th>
                            <td>
                                {{ $driver->address }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.driver.fields.cnic') }}
                            </th>
                            <td>
                                {{ $driver->cnic }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.driver.fields.medical_condition') }}
                            </th>
                            <td>
                                {{ $driver->medical_condition }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.driver.fields.emergency_medication') }}
                            </th>
                            <td>
                                {{ $driver->emergency_medication }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.driver.fields.allergies') }}
                            </th>
                            <td>
                                {{ $driver->allergies }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.driver.fields.hire_date') }}
                            </th>
                            <td>
                                {{ $driver->hire_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.driver.fields.image_url') }}
                            </th>
                            <td>
                                {{ $driver->image_url }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.driver.fields.blood_group') }}
                            </th>
                            <td>
                                {{ $driver->blood_group_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.driver.fields.profile_picture') }}
                            </th>
                            <td>
                                @foreach($driver->profile_picture as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.driver.fields.dob') }}
                            </th>
                            <td>
                                {{ $driver->dob }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.driver.fields.license_expiry_date') }}
                            </th>
                            <td>
                                {{ $driver->license_expiry_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.driver.fields.gender') }}
                            </th>
                            <td>
                                {{ $driver->gender_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('driver_edit')
                    <a href="{{ route('admin.drivers.edit', $driver) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.drivers.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
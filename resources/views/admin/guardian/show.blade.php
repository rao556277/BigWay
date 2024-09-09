@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.guardian.title_singular') }}:
                    {{ trans('cruds.guardian.fields.id') }}
                    {{ $guardian->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.guardian.fields.id') }}
                            </th>
                            <td>
                                {{ $guardian->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.guardian.fields.name') }}
                            </th>
                            <td>
                                {{ $guardian->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.guardian.fields.address') }}
                            </th>
                            <td>
                                {{ $guardian->address }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.guardian.fields.payment_details') }}
                            </th>
                            <td>
                                {{ $guardian->payment_details }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.guardian.fields.verified') }}
                            </th>
                            <td>
                                {{ $guardian->verified }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.guardian.fields.profile_picture') }}
                            </th>
                            <td>
                                @foreach($guardian->profile_picture as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.guardian.fields.gender') }}
                            </th>
                            <td>
                                {{ $guardian->gender_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('guardian_edit')
                    <a href="{{ route('admin.guardians.edit', $guardian) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.guardians.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
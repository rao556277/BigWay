@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.vendor.title_singular') }}:
                    {{ trans('cruds.vendor.fields.id') }}
                    {{ $vendor->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.vendor.fields.id') }}
                            </th>
                            <td>
                                {{ $vendor->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.vendor.fields.name') }}
                            </th>
                            <td>
                                {{ $vendor->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.vendor.fields.contact_details') }}
                            </th>
                            <td>
                                {{ $vendor->contact_details }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.vendor.fields.contract_details') }}
                            </th>
                            <td>
                                {{ $vendor->contract_details }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.vendor.fields.vendor_type') }}
                            </th>
                            <td>
                                {{ $vendor->vendor_type }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.vendor.fields.user') }}
                            </th>
                            <td>
                                @if($vendor->user)
                                    <span class="badge badge-relationship">{{ $vendor->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.vendor.fields.profile_picture') }}
                            </th>
                            <td>
                                @foreach($vendor->profile_picture as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.vendor.fields.gender') }}
                            </th>
                            <td>
                                {{ $vendor->gender_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('vendor_edit')
                    <a href="{{ route('admin.vendors.edit', $vendor) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.vendors.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
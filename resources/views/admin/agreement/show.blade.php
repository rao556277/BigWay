@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.agreement.title_singular') }}:
                    {{ trans('cruds.agreement.fields.id') }}
                    {{ $agreement->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.agreement.fields.id') }}
                            </th>
                            <td>
                                {{ $agreement->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.agreement.fields.party_type') }}
                            </th>
                            <td>
                                {{ $agreement->party_type }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.agreement.fields.agreement_date') }}
                            </th>
                            <td>
                                {{ $agreement->agreement_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.agreement.fields.description') }}
                            </th>
                            <td>
                                {{ $agreement->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.agreement.fields.party') }}
                            </th>
                            <td>
                                {{ $agreement->party }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.agreement.fields.terms') }}
                            </th>
                            <td>
                                {{ $agreement->terms }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.agreement.fields.expiry_date') }}
                            </th>
                            <td>
                                {{ $agreement->expiry_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.agreement.fields.signature_image') }}
                            </th>
                            <td>
                                {{ $agreement->signature_image }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.agreement.fields.user') }}
                            </th>
                            <td>
                                @if($agreement->user)
                                    <span class="badge badge-relationship">{{ $agreement->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('agreement_edit')
                    <a href="{{ route('admin.agreements.edit', $agreement) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.agreements.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
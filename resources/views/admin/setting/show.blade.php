@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.setting.title_singular') }}:
                    {{ trans('cruds.setting.fields.id') }}
                    {{ $setting->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.id') }}
                            </th>
                            <td>
                                {{ $setting->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.logo_url') }}
                            </th>
                            <td>
                                {{ $setting->logo_url }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.company_name') }}
                            </th>
                            <td>
                                {{ $setting->company_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.currency') }}
                            </th>
                            <td>
                                {{ $setting->currency }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.contact_email') }}
                            </th>
                            <td>
                                {{ $setting->contact_email }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.contact_phone') }}
                            </th>
                            <td>
                                {{ $setting->contact_phone }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.language') }}
                            </th>
                            <td>
                                {{ $setting->language }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.maintenance_mode') }}
                            </th>
                            <td>
                                {{ $setting->maintenance_mode }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.backup_frequency') }}
                            </th>
                            <td>
                                {{ $setting->backup_frequency }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.backup_location') }}
                            </th>
                            <td>
                                {{ $setting->backup_location }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.support_url') }}
                            </th>
                            <td>
                                {{ $setting->support_url }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.social_media_links') }}
                            </th>
                            <td>
                                {{ $setting->social_media_links }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.terms_url') }}
                            </th>
                            <td>
                                {{ $setting->terms_url }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.privacy_policy_url') }}
                            </th>
                            <td>
                                {{ $setting->privacy_policy_url }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.timezone') }}
                            </th>
                            <td>
                                {{ $setting->timezone }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('setting_edit')
                    <a href="{{ route('admin.settings.edit', $setting) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
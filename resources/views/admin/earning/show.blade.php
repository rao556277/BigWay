@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.earning.title_singular') }}:
                    {{ trans('cruds.earning.fields.id') }}
                    {{ $earning->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.earning.fields.id') }}
                            </th>
                            <td>
                                {{ $earning->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.earning.fields.amount') }}
                            </th>
                            <td>
                                {{ $earning->amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.earning.fields.date') }}
                            </th>
                            <td>
                                {{ $earning->date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.earning.fields.payment_method') }}
                            </th>
                            <td>
                                {{ $earning->payment_method }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.earning.fields.description') }}
                            </th>
                            <td>
                                {{ $earning->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('earning_edit')
                    <a href="{{ route('admin.earnings.edit', $earning) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.earnings.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
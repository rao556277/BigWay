@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.payment.title_singular') }}:
                    {{ trans('cruds.payment.fields.id') }}
                    {{ $payment->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.id') }}
                            </th>
                            <td>
                                {{ $payment->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.transaction') }}
                            </th>
                            <td>
                                {{ $payment->transaction }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.amount') }}
                            </th>
                            <td>
                                {{ $payment->amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.payment_method') }}
                            </th>
                            <td>
                                {{ $payment->payment_method }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.reference_number') }}
                            </th>
                            <td>
                                {{ $payment->reference_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.date') }}
                            </th>
                            <td>
                                {{ $payment->date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.guardian') }}
                            </th>
                            <td>
                                @if($payment->guardian)
                                    <span class="badge badge-relationship">{{ $payment->guardian->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.student') }}
                            </th>
                            <td>
                                @if($payment->student)
                                    <span class="badge badge-relationship">{{ $payment->student->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.route') }}
                            </th>
                            <td>
                                @foreach($payment->route as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->route_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('payment_edit')
                    <a href="{{ route('admin.payments.edit', $payment) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
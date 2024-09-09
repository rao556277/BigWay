@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.booking.title_singular') }}:
                    {{ trans('cruds.booking.fields.id') }}
                    {{ $booking->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.booking.fields.id') }}
                            </th>
                            <td>
                                {{ $booking->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.booking.fields.booking_date') }}
                            </th>
                            <td>
                                {{ $booking->booking_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.booking.fields.start_date') }}
                            </th>
                            <td>
                                {{ $booking->start_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.booking.fields.end_date') }}
                            </th>
                            <td>
                                {{ $booking->end_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.booking.fields.status') }}
                            </th>
                            <td>
                                {{ $booking->status }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.booking.fields.cost') }}
                            </th>
                            <td>
                                {{ $booking->cost }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.booking.fields.amount') }}
                            </th>
                            <td>
                                {{ $booking->amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.booking.fields.payment_status') }}
                            </th>
                            <td>
                                {{ $booking->payment_status }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.booking.fields.booking_status') }}
                            </th>
                            <td>
                                {{ $booking->booking_status }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.booking.fields.description') }}
                            </th>
                            <td>
                                {{ $booking->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.booking.fields.user') }}
                            </th>
                            <td>
                                @foreach($booking->user as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.booking.fields.student') }}
                            </th>
                            <td>
                                @foreach($booking->student as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.booking.fields.vehicle') }}
                            </th>
                            <td>
                                @foreach($booking->vehicle as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->vehicle_number }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('booking_edit')
                    <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
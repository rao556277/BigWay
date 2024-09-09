@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.attendance.title_singular') }}:
                    {{ trans('cruds.attendance.fields.id') }}
                    {{ $attendance->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('attendance.edit', [$attendance])
        </div>
    </div>
</div>
@endsection
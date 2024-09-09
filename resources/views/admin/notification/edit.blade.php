@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.notification.title_singular') }}:
                    {{ trans('cruds.notification.fields.id') }}
                    {{ $notification->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('notification.edit', [$notification])
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.notification.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('notification_create')
                    <a class="btn btn-indigo" href="{{ route('admin.notifications.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.notification.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('notification.index')

    </div>
</div>
@endsection
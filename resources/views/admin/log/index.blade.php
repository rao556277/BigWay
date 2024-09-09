@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.log.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('log_create')
                    <a class="btn btn-indigo" href="{{ route('admin.logs.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.log.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('log.index')

    </div>
</div>
@endsection
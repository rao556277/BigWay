@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.package.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('package_create')
                    <a class="btn btn-indigo" href="{{ route('admin.packages.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.package.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('package.index')

    </div>
</div>
@endsection
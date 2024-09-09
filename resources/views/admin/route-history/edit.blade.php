@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.routeHistory.title_singular') }}:
                    {{ trans('cruds.routeHistory.fields.id') }}
                    {{ $routeHistory->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('route-history.edit', [$routeHistory])
        </div>
    </div>
</div>
@endsection
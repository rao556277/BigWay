@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.driver.title_singular') }}:
                    {{ trans('cruds.driver.fields.id') }}
                    {{ $driver->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('driver.edit', [$driver])
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.vehicle.title_singular') }}:
                    {{ trans('cruds.vehicle.fields.id') }}
                    {{ $vehicle->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('vehicle.edit', [$vehicle])
        </div>
    </div>
</div>
@endsection
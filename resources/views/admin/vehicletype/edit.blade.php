@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.vehicletype.title_singular') }}:
                    {{ trans('cruds.vehicletype.fields.id') }}
                    {{ $vehicletype->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('vehicletype.edit', [$vehicletype])
        </div>
    </div>
</div>
@endsection
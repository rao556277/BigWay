@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.vendor.title_singular') }}:
                    {{ trans('cruds.vendor.fields.id') }}
                    {{ $vendor->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('vendor.edit', [$vendor])
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.package.title_singular') }}:
                    {{ trans('cruds.package.fields.id') }}
                    {{ $package->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('package.edit', [$package])
        </div>
    </div>
</div>
@endsection
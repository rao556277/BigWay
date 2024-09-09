@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.commission.title_singular') }}:
                    {{ trans('cruds.commission.fields.id') }}
                    {{ $commission->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('commission.edit', [$commission])
        </div>
    </div>
</div>
@endsection
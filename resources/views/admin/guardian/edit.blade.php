@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.guardian.title_singular') }}:
                    {{ trans('cruds.guardian.fields.id') }}
                    {{ $guardian->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('guardian.edit', [$guardian])
        </div>
    </div>
</div>
@endsection
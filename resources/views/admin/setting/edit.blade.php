@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.setting.title_singular') }}:
                    {{ trans('cruds.setting.fields.id') }}
                    {{ $setting->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('setting.edit', [$setting])
        </div>
    </div>
</div>
@endsection
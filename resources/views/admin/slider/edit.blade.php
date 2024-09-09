@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.slider.title_singular') }}:
                    {{ trans('cruds.slider.fields.id') }}
                    {{ $slider->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('slider.edit', [$slider])
        </div>
    </div>
</div>
@endsection
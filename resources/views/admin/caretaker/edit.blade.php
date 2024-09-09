@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.caretaker.title_singular') }}:
                    {{ trans('cruds.caretaker.fields.id') }}
                    {{ $caretaker->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('caretaker.edit', [$caretaker])
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.junction.title_singular') }}:
                    {{ trans('cruds.junction.fields.id') }}
                    {{ $junction->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('junction.edit', [$junction])
        </div>
    </div>
</div>
@endsection
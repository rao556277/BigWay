@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.admin.title_singular') }}:
                    {{ trans('cruds.admin.fields.id') }}
                    {{ $admin->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('admin.edit', [$admin])
        </div>
    </div>
</div>
@endsection
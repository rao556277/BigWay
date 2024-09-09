@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.agreement.title_singular') }}:
                    {{ trans('cruds.agreement.fields.id') }}
                    {{ $agreement->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('agreement.edit', [$agreement])
        </div>
    </div>
</div>
@endsection
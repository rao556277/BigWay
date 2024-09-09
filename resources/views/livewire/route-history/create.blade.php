<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('routeHistory.vehicle') ? 'invalid' : '' }}">
        <label class="form-label" for="vehicle">{{ trans('cruds.routeHistory.fields.vehicle') }}</label>
        <input class="form-control" type="number" name="vehicle" id="vehicle" wire:model.defer="routeHistory.vehicle" step="1">
        <div class="validation-message">
            {{ $errors->first('routeHistory.vehicle') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.routeHistory.fields.vehicle_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('routeHistory.start_time') ? 'invalid' : '' }}">
        <label class="form-label" for="start_time">{{ trans('cruds.routeHistory.fields.start_time') }}</label>
        <x-date-picker class="form-control" wire:model="routeHistory.start_time" id="start_time" name="start_time" />
        <div class="validation-message">
            {{ $errors->first('routeHistory.start_time') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.routeHistory.fields.start_time_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('routeHistory.end_time') ? 'invalid' : '' }}">
        <label class="form-label" for="end_time">{{ trans('cruds.routeHistory.fields.end_time') }}</label>
        <x-date-picker class="form-control" wire:model="routeHistory.end_time" id="end_time" name="end_time" />
        <div class="validation-message">
            {{ $errors->first('routeHistory.end_time') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.routeHistory.fields.end_time_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('routeHistory.distance_travelled') ? 'invalid' : '' }}">
        <label class="form-label" for="distance_travelled">{{ trans('cruds.routeHistory.fields.distance_travelled') }}</label>
        <input class="form-control" type="number" name="distance_travelled" id="distance_travelled" wire:model.defer="routeHistory.distance_travelled" step="0.01">
        <div class="validation-message">
            {{ $errors->first('routeHistory.distance_travelled') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.routeHistory.fields.distance_travelled_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('vendor') ? 'invalid' : '' }}">
        <label class="form-label" for="vendor">{{ trans('cruds.routeHistory.fields.vendor') }}</label>
        <x-select-list class="form-control" id="vendor" name="vendor" wire:model="vendor" :options="$this->listsForFields['vendor']" multiple />
        <div class="validation-message">
            {{ $errors->first('vendor') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.routeHistory.fields.vendor_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('vehicle_type') ? 'invalid' : '' }}">
        <label class="form-label" for="vehicle_type">{{ trans('cruds.routeHistory.fields.vehicle_type') }}</label>
        <x-select-list class="form-control" id="vehicle_type" name="vehicle_type" wire:model="vehicle_type" :options="$this->listsForFields['vehicle_type']" multiple />
        <div class="validation-message">
            {{ $errors->first('vehicle_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.routeHistory.fields.vehicle_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('route') ? 'invalid' : '' }}">
        <label class="form-label" for="route">{{ trans('cruds.routeHistory.fields.route') }}</label>
        <x-select-list class="form-control" id="route" name="route" wire:model="route" :options="$this->listsForFields['route']" multiple />
        <div class="validation-message">
            {{ $errors->first('route') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.routeHistory.fields.route_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.route-histories.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
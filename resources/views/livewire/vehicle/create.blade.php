<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('vehicle.vehicle_number') ? 'invalid' : '' }}">
        <label class="form-label required" for="vehicle_number">{{ trans('cruds.vehicle.fields.vehicle_number') }}</label>
        <input class="form-control" type="text" name="vehicle_number" id="vehicle_number" required wire:model.defer="vehicle.vehicle_number">
        <div class="validation-message">
            {{ $errors->first('vehicle.vehicle_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.vehicle.fields.vehicle_number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('vehicle.capacity') ? 'invalid' : '' }}">
        <label class="form-label" for="capacity">{{ trans('cruds.vehicle.fields.capacity') }}</label>
        <input class="form-control" type="number" name="capacity" id="capacity" wire:model.defer="vehicle.capacity" step="1">
        <div class="validation-message">
            {{ $errors->first('vehicle.capacity') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.vehicle.fields.capacity_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('caretaker') ? 'invalid' : '' }}">
        <label class="form-label" for="caretaker">{{ trans('cruds.vehicle.fields.caretaker') }}</label>
        <x-select-list class="form-control" id="caretaker" name="caretaker" wire:model="caretaker" :options="$this->listsForFields['caretaker']" multiple />
        <div class="validation-message">
            {{ $errors->first('caretaker') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.vehicle.fields.caretaker_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('vehicle.driver_id') ? 'invalid' : '' }}">
        <label class="form-label" for="driver">{{ trans('cruds.vehicle.fields.driver') }}</label>
        <x-select-list class="form-control" id="driver" name="driver" :options="$this->listsForFields['driver']" wire:model="vehicle.driver_id" />
        <div class="validation-message">
            {{ $errors->first('vehicle.driver_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.vehicle.fields.driver_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('vehicle.route_id') ? 'invalid' : '' }}">
        <label class="form-label" for="route">{{ trans('cruds.vehicle.fields.route') }}</label>
        <x-select-list class="form-control" id="route" name="route" :options="$this->listsForFields['route']" wire:model="vehicle.route_id" />
        <div class="validation-message">
            {{ $errors->first('vehicle.route_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.vehicle.fields.route_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('vehicle_type') ? 'invalid' : '' }}">
        <label class="form-label" for="vehicle_type">{{ trans('cruds.vehicle.fields.vehicle_type') }}</label>
        <x-select-list class="form-control" id="vehicle_type" name="vehicle_type" wire:model="vehicle_type" :options="$this->listsForFields['vehicle_type']" multiple />
        <div class="validation-message">
            {{ $errors->first('vehicle_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.vehicle.fields.vehicle_type_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.vehicles.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
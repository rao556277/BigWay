<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('junction.junction_name') ? 'invalid' : '' }}">
        <label class="form-label" for="junction_name">{{ trans('cruds.junction.fields.junction_name') }}</label>
        <input class="form-control" type="text" name="junction_name" id="junction_name" wire:model.defer="junction.junction_name">
        <div class="validation-message">
            {{ $errors->first('junction.junction_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.junction.fields.junction_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('junction.arrival_time') ? 'invalid' : '' }}">
        <label class="form-label" for="arrival_time">{{ trans('cruds.junction.fields.arrival_time') }}</label>
        <x-date-picker class="form-control" wire:model="junction.arrival_time" id="arrival_time" name="arrival_time" />
        <div class="validation-message">
            {{ $errors->first('junction.arrival_time') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.junction.fields.arrival_time_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('junction.departure_time') ? 'invalid' : '' }}">
        <label class="form-label" for="departure_time">{{ trans('cruds.junction.fields.departure_time') }}</label>
        <x-date-picker class="form-control" wire:model="junction.departure_time" id="departure_time" name="departure_time" />
        <div class="validation-message">
            {{ $errors->first('junction.departure_time') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.junction.fields.departure_time_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('junction.distance_from_last_location') ? 'invalid' : '' }}">
        <label class="form-label" for="distance_from_last_location">{{ trans('cruds.junction.fields.distance_from_last_location') }}</label>
        <input class="form-control" type="number" name="distance_from_last_location" id="distance_from_last_location" wire:model.defer="junction.distance_from_last_location" step="0.01">
        <div class="validation-message">
            {{ $errors->first('junction.distance_from_last_location') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.junction.fields.distance_from_last_location_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('junction.location_id') ? 'invalid' : '' }}">
        <label class="form-label" for="location">{{ trans('cruds.junction.fields.location') }}</label>
        <x-select-list class="form-control" id="location" name="location" :options="$this->listsForFields['location']" wire:model="junction.location_id" />
        <div class="validation-message">
            {{ $errors->first('junction.location_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.junction.fields.location_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.junctions.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
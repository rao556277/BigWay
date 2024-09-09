<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('route.route_name') ? 'invalid' : '' }}">
        <label class="form-label" for="route_name">{{ trans('cruds.route.fields.route_name') }}</label>
        <input class="form-control" type="text" name="route_name" id="route_name" wire:model.defer="route.route_name">
        <div class="validation-message">
            {{ $errors->first('route.route_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.route.fields.route_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('route.start_location_type') ? 'invalid' : '' }}">
        <label class="form-label" for="start_location_type">{{ trans('cruds.route.fields.start_location_type') }}</label>
        <x-date-picker class="form-control" wire:model="route.start_location_type" id="start_location_type" name="start_location_type" picker="date" />
        <div class="validation-message">
            {{ $errors->first('route.start_location_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.route.fields.start_location_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('route.start_location') ? 'invalid' : '' }}">
        <label class="form-label" for="start_location">{{ trans('cruds.route.fields.start_location') }}</label>
        <input class="form-control" type="number" name="start_location" id="start_location" wire:model.defer="route.start_location" step="1">
        <div class="validation-message">
            {{ $errors->first('route.start_location') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.route.fields.start_location_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('route.end_location_type') ? 'invalid' : '' }}">
        <label class="form-label" for="end_location_type">{{ trans('cruds.route.fields.end_location_type') }}</label>
        <input class="form-control" type="text" name="end_location_type" id="end_location_type" wire:model.defer="route.end_location_type">
        <div class="validation-message">
            {{ $errors->first('route.end_location_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.route.fields.end_location_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('route.end_location') ? 'invalid' : '' }}">
        <label class="form-label" for="end_location">{{ trans('cruds.route.fields.end_location') }}</label>
        <input class="form-control" type="number" name="end_location" id="end_location" wire:model.defer="route.end_location" step="1">
        <div class="validation-message">
            {{ $errors->first('route.end_location') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.route.fields.end_location_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('route.total_distance') ? 'invalid' : '' }}">
        <label class="form-label" for="total_distance">{{ trans('cruds.route.fields.total_distance') }}</label>
        <input class="form-control" type="number" name="total_distance" id="total_distance" wire:model.defer="route.total_distance" step="0.01">
        <div class="validation-message">
            {{ $errors->first('route.total_distance') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.route.fields.total_distance_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('route.estimated_time') ? 'invalid' : '' }}">
        <label class="form-label" for="estimated_time">{{ trans('cruds.route.fields.estimated_time') }}</label>
        <input class="form-control" type="text" name="estimated_time" id="estimated_time" wire:model.defer="route.estimated_time">
        <div class="validation-message">
            {{ $errors->first('route.estimated_time') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.route.fields.estimated_time_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.routes.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
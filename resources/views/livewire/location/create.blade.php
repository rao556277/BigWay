<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('location.user') ? 'invalid' : '' }}">
        <label class="form-label required" for="user">{{ trans('cruds.location.fields.user') }}</label>
        <input class="form-control" type="number" name="user" id="user" required wire:model.defer="location.user" step="1">
        <div class="validation-message">
            {{ $errors->first('location.user') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.location.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('location.latitude') ? 'invalid' : '' }}">
        <label class="form-label required" for="latitude">{{ trans('cruds.location.fields.latitude') }}</label>
        <input class="form-control" type="number" name="latitude" id="latitude" required wire:model.defer="location.latitude" step="0.01">
        <div class="validation-message">
            {{ $errors->first('location.latitude') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.location.fields.latitude_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('location.longitude') ? 'invalid' : '' }}">
        <label class="form-label required" for="longitude">{{ trans('cruds.location.fields.longitude') }}</label>
        <input class="form-control" type="number" name="longitude" id="longitude" required wire:model.defer="location.longitude" step="0.01">
        <div class="validation-message">
            {{ $errors->first('location.longitude') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.location.fields.longitude_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('location.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.location.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="location.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('location.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.location.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.locations.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('vehicletype.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.vehicletype.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="vehicletype.name">
        <div class="validation-message">
            {{ $errors->first('vehicletype.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.vehicletype.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('vehicletype.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.vehicletype.fields.description') }}</label>
        <input class="form-control" type="text" name="description" id="description" wire:model.defer="vehicletype.description">
        <div class="validation-message">
            {{ $errors->first('vehicletype.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.vehicletype.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.vehicletypes.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
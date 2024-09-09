<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('package.package_name') ? 'invalid' : '' }}">
        <label class="form-label required" for="package_name">{{ trans('cruds.package.fields.package_name') }}</label>
        <input class="form-control" type="text" name="package_name" id="package_name" required wire:model.defer="package.package_name">
        <div class="validation-message">
            {{ $errors->first('package.package_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.package.fields.package_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('package.price') ? 'invalid' : '' }}">
        <label class="form-label" for="price">{{ trans('cruds.package.fields.price') }}</label>
        <input class="form-control" type="number" name="price" id="price" wire:model.defer="package.price" step="0.01">
        <div class="validation-message">
            {{ $errors->first('package.price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.package.fields.price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('package.duration') ? 'invalid' : '' }}">
        <label class="form-label" for="duration">{{ trans('cruds.package.fields.duration') }}</label>
        <input class="form-control" type="text" name="duration" id="duration" wire:model.defer="package.duration">
        <div class="validation-message">
            {{ $errors->first('package.duration') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.package.fields.duration_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('package.package_type') ? 'invalid' : '' }}">
        <label class="form-label" for="package_type">{{ trans('cruds.package.fields.package_type') }}</label>
        <input class="form-control" type="text" name="package_type" id="package_type" wire:model.defer="package.package_type">
        <div class="validation-message">
            {{ $errors->first('package.package_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.package.fields.package_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('package.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.package.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="package.user_id" />
        <div class="validation-message">
            {{ $errors->first('package.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.package.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('package.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.package.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="package.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('package.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.package.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
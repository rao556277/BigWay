<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('log.entity_type') ? 'invalid' : '' }}">
        <label class="form-label" for="entity_type">{{ trans('cruds.log.fields.entity_type') }}</label>
        <input class="form-control" type="text" name="entity_type" id="entity_type" wire:model.defer="log.entity_type">
        <div class="validation-message">
            {{ $errors->first('log.entity_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.log.fields.entity_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('log.entity') ? 'invalid' : '' }}">
        <label class="form-label" for="entity">{{ trans('cruds.log.fields.entity') }}</label>
        <input class="form-control" type="number" name="entity" id="entity" wire:model.defer="log.entity" step="1">
        <div class="validation-message">
            {{ $errors->first('log.entity') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.log.fields.entity_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('log.action') ? 'invalid' : '' }}">
        <label class="form-label" for="action">{{ trans('cruds.log.fields.action') }}</label>
        <input class="form-control" type="text" name="action" id="action" wire:model.defer="log.action">
        <div class="validation-message">
            {{ $errors->first('log.action') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.log.fields.action_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('log.timezone') ? 'invalid' : '' }}">
        <label class="form-label" for="timezone">{{ trans('cruds.log.fields.timezone') }}</label>
        <x-date-picker class="form-control" wire:model="log.timezone" id="timezone" name="timezone" />
        <div class="validation-message">
            {{ $errors->first('log.timezone') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.log.fields.timezone_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.log.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" wire:model="user" :options="$this->listsForFields['user']" multiple />
        <div class="validation-message">
            {{ $errors->first('user') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.log.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('log.performed_by_id') ? 'invalid' : '' }}">
        <label class="form-label" for="performed_by">{{ trans('cruds.log.fields.performed_by') }}</label>
        <x-select-list class="form-control" id="performed_by" name="performed_by" :options="$this->listsForFields['performed_by']" wire:model="log.performed_by_id" />
        <div class="validation-message">
            {{ $errors->first('log.performed_by_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.log.fields.performed_by_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('log.created_by_id') ? 'invalid' : '' }}">
        <label class="form-label" for="created_by">{{ trans('cruds.log.fields.created_by') }}</label>
        <x-select-list class="form-control" id="created_by" name="created_by" :options="$this->listsForFields['created_by']" wire:model="log.created_by_id" />
        <div class="validation-message">
            {{ $errors->first('log.created_by_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.log.fields.created_by_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.logs.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
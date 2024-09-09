<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('notification.user') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.notification.fields.user') }}</label>
        <input class="form-control" type="number" name="user" id="user" wire:model.defer="notification.user" step="1">
        <div class="validation-message">
            {{ $errors->first('notification.user') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.notification.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('notification.type') ? 'invalid' : '' }}">
        <label class="form-label" for="type">{{ trans('cruds.notification.fields.type') }}</label>
        <input class="form-control" type="text" name="type" id="type" wire:model.defer="notification.type">
        <div class="validation-message">
            {{ $errors->first('notification.type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.notification.fields.type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('notification.message') ? 'invalid' : '' }}">
        <label class="form-label" for="message">{{ trans('cruds.notification.fields.message') }}</label>
        <input class="form-control" type="text" name="message" id="message" wire:model.defer="notification.message">
        <div class="validation-message">
            {{ $errors->first('notification.message') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.notification.fields.message_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('for') ? 'invalid' : '' }}">
        <label class="form-label" for="for">{{ trans('cruds.notification.fields.for') }}</label>
        <x-select-list class="form-control" id="for" name="for" wire:model="for" :options="$this->listsForFields['for']" multiple />
        <div class="validation-message">
            {{ $errors->first('for') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.notification.fields.for_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('notification.for_user') ? 'invalid' : '' }}">
        <label class="form-label" for="for_user">{{ trans('cruds.notification.fields.for_user') }}</label>
        <input class="form-control" type="number" name="for_user" id="for_user" wire:model.defer="notification.for_user" step="1">
        <div class="validation-message">
            {{ $errors->first('notification.for_user') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.notification.fields.for_user_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.notifications.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
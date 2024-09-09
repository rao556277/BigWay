<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('school.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.school.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="school.name">
        <div class="validation-message">
            {{ $errors->first('school.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.school.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('school.address') ? 'invalid' : '' }}">
        <label class="form-label required" for="address">{{ trans('cruds.school.fields.address') }}</label>
        <input class="form-control" type="text" name="address" id="address" required wire:model.defer="school.address">
        <div class="validation-message">
            {{ $errors->first('school.address') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.school.fields.address_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('school.contact_number') ? 'invalid' : '' }}">
        <label class="form-label required" for="contact_number">{{ trans('cruds.school.fields.contact_number') }}</label>
        <input class="form-control" type="text" name="contact_number" id="contact_number" required wire:model.defer="school.contact_number">
        <div class="validation-message">
            {{ $errors->first('school.contact_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.school.fields.contact_number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('school.location_id') ? 'invalid' : '' }}">
        <label class="form-label" for="location">{{ trans('cruds.school.fields.location') }}</label>
        <x-select-list class="form-control" id="location" name="location" :options="$this->listsForFields['location']" wire:model="school.location_id" />
        <div class="validation-message">
            {{ $errors->first('school.location_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.school.fields.location_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('school.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.school.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="school.user_id" />
        <div class="validation-message">
            {{ $errors->first('school.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.school.fields.user_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.schools.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
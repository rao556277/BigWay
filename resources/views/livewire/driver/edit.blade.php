<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('driver.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.driver.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="driver.name">
        <div class="validation-message">
            {{ $errors->first('driver.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.driver.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('driver.license_number') ? 'invalid' : '' }}">
        <label class="form-label" for="license_number">{{ trans('cruds.driver.fields.license_number') }}</label>
        <input class="form-control" type="text" name="license_number" id="license_number" wire:model.defer="driver.license_number">
        <div class="validation-message">
            {{ $errors->first('driver.license_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.driver.fields.license_number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('driver.address') ? 'invalid' : '' }}">
        <label class="form-label" for="address">{{ trans('cruds.driver.fields.address') }}</label>
        <textarea class="form-control" name="address" id="address" wire:model.defer="driver.address" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('driver.address') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.driver.fields.address_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('driver.cnic') ? 'invalid' : '' }}">
        <label class="form-label" for="cnic">{{ trans('cruds.driver.fields.cnic') }}</label>
        <input class="form-control" type="text" name="cnic" id="cnic" wire:model.defer="driver.cnic">
        <div class="validation-message">
            {{ $errors->first('driver.cnic') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.driver.fields.cnic_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('driver.medical_condition') ? 'invalid' : '' }}">
        <label class="form-label" for="medical_condition">{{ trans('cruds.driver.fields.medical_condition') }}</label>
        <textarea class="form-control" name="medical_condition" id="medical_condition" wire:model.defer="driver.medical_condition" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('driver.medical_condition') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.driver.fields.medical_condition_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('driver.emergency_medication') ? 'invalid' : '' }}">
        <label class="form-label" for="emergency_medication">{{ trans('cruds.driver.fields.emergency_medication') }}</label>
        <textarea class="form-control" name="emergency_medication" id="emergency_medication" wire:model.defer="driver.emergency_medication" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('driver.emergency_medication') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.driver.fields.emergency_medication_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('driver.allergies') ? 'invalid' : '' }}">
        <label class="form-label" for="allergies">{{ trans('cruds.driver.fields.allergies') }}</label>
        <input class="form-control" type="text" name="allergies" id="allergies" wire:model.defer="driver.allergies">
        <div class="validation-message">
            {{ $errors->first('driver.allergies') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.driver.fields.allergies_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('driver.hire_date') ? 'invalid' : '' }}">
        <label class="form-label" for="hire_date">{{ trans('cruds.driver.fields.hire_date') }}</label>
        <input class="form-control" type="text" name="hire_date" id="hire_date" wire:model.defer="driver.hire_date">
        <div class="validation-message">
            {{ $errors->first('driver.hire_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.driver.fields.hire_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('driver.image_url') ? 'invalid' : '' }}">
        <label class="form-label" for="image_url">{{ trans('cruds.driver.fields.image_url') }}</label>
        <input class="form-control" type="text" name="image_url" id="image_url" wire:model.defer="driver.image_url">
        <div class="validation-message">
            {{ $errors->first('driver.image_url') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.driver.fields.image_url_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('driver.blood_group') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.driver.fields.blood_group') }}</label>
        <select class="form-control" wire:model="driver.blood_group">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['blood_group'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('driver.blood_group') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.driver.fields.blood_group_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.driver_profile_picture') ? 'invalid' : '' }}">
        <label class="form-label" for="profile_picture">{{ trans('cruds.driver.fields.profile_picture') }}</label>
        <x-dropzone id="profile_picture" name="profile_picture" action="{{ route('admin.drivers.storeMedia') }}" collection-name="driver_profile_picture" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.driver_profile_picture') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.driver.fields.profile_picture_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('driver.dob') ? 'invalid' : '' }}">
        <label class="form-label" for="dob">{{ trans('cruds.driver.fields.dob') }}</label>
        <x-date-picker class="form-control" wire:model="driver.dob" id="dob" name="dob" picker="date" />
        <div class="validation-message">
            {{ $errors->first('driver.dob') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.driver.fields.dob_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('driver.license_expiry_date') ? 'invalid' : '' }}">
        <label class="form-label" for="license_expiry_date">{{ trans('cruds.driver.fields.license_expiry_date') }}</label>
        <x-date-picker class="form-control" wire:model="driver.license_expiry_date" id="license_expiry_date" name="license_expiry_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('driver.license_expiry_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.driver.fields.license_expiry_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('driver.gender') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.driver.fields.gender') }}</label>
        @foreach($this->listsForFields['gender'] as $key => $value)
            <label class="radio-label"><input type="radio" name="gender" wire:model="driver.gender" value="{{ $key }}">{{ $value }}</label>
        @endforeach
        <div class="validation-message">
            {{ $errors->first('driver.gender') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.driver.fields.gender_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.drivers.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
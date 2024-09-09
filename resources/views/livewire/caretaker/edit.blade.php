<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('caretaker.name') ? 'invalid' : '' }}">
        <label class="form-label" for="name">{{ trans('cruds.caretaker.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" wire:model.defer="caretaker.name">
        <div class="validation-message">
            {{ $errors->first('caretaker.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.caretaker.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('caretaker.address') ? 'invalid' : '' }}">
        <label class="form-label" for="address">{{ trans('cruds.caretaker.fields.address') }}</label>
        <input class="form-control" type="text" name="address" id="address" wire:model.defer="caretaker.address">
        <div class="validation-message">
            {{ $errors->first('caretaker.address') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.caretaker.fields.address_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('caretaker.cnic') ? 'invalid' : '' }}">
        <label class="form-label" for="cnic">{{ trans('cruds.caretaker.fields.cnic') }}</label>
        <input class="form-control" type="text" name="cnic" id="cnic" wire:model.defer="caretaker.cnic">
        <div class="validation-message">
            {{ $errors->first('caretaker.cnic') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.caretaker.fields.cnic_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('caretaker.image_url') ? 'invalid' : '' }}">
        <label class="form-label" for="image_url">{{ trans('cruds.caretaker.fields.image_url') }}</label>
        <input class="form-control" type="text" name="image_url" id="image_url" wire:model.defer="caretaker.image_url">
        <div class="validation-message">
            {{ $errors->first('caretaker.image_url') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.caretaker.fields.image_url_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('caretaker.medical_condition') ? 'invalid' : '' }}">
        <label class="form-label" for="medical_condition">{{ trans('cruds.caretaker.fields.medical_condition') }}</label>
        <input class="form-control" type="text" name="medical_condition" id="medical_condition" wire:model.defer="caretaker.medical_condition">
        <div class="validation-message">
            {{ $errors->first('caretaker.medical_condition') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.caretaker.fields.medical_condition_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('caretaker.emergency_medication') ? 'invalid' : '' }}">
        <label class="form-label" for="emergency_medication">{{ trans('cruds.caretaker.fields.emergency_medication') }}</label>
        <input class="form-control" type="text" name="emergency_medication" id="emergency_medication" wire:model.defer="caretaker.emergency_medication">
        <div class="validation-message">
            {{ $errors->first('caretaker.emergency_medication') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.caretaker.fields.emergency_medication_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('caretaker.allergies') ? 'invalid' : '' }}">
        <label class="form-label" for="allergies">{{ trans('cruds.caretaker.fields.allergies') }}</label>
        <input class="form-control" type="text" name="allergies" id="allergies" wire:model.defer="caretaker.allergies">
        <div class="validation-message">
            {{ $errors->first('caretaker.allergies') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.caretaker.fields.allergies_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('caretaker.employment_date') ? 'invalid' : '' }}">
        <label class="form-label" for="employment_date">{{ trans('cruds.caretaker.fields.employment_date') }}</label>
        <x-date-picker class="form-control" wire:model="caretaker.employment_date" id="employment_date" name="employment_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('caretaker.employment_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.caretaker.fields.employment_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('caretaker.date_of_birth') ? 'invalid' : '' }}">
        <label class="form-label" for="date_of_birth">{{ trans('cruds.caretaker.fields.date_of_birth') }}</label>
        <x-date-picker class="form-control" wire:model="caretaker.date_of_birth" id="date_of_birth" name="date_of_birth" picker="date" />
        <div class="validation-message">
            {{ $errors->first('caretaker.date_of_birth') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.caretaker.fields.date_of_birth_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('caretaker.blood_group') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.caretaker.fields.blood_group') }}</label>
        <select class="form-control" wire:model="caretaker.blood_group">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['blood_group'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('caretaker.blood_group') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.caretaker.fields.blood_group_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('caretaker.vehicle_type_id') ? 'invalid' : '' }}">
        <label class="form-label" for="vehicle_type">{{ trans('cruds.caretaker.fields.vehicle_type') }}</label>
        <x-select-list class="form-control" id="vehicle_type" name="vehicle_type" :options="$this->listsForFields['vehicle_type']" wire:model="caretaker.vehicle_type_id" />
        <div class="validation-message">
            {{ $errors->first('caretaker.vehicle_type_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.caretaker.fields.vehicle_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('caretaker.emergency_contact_id') ? 'invalid' : '' }}">
        <label class="form-label" for="emergency_contact">{{ trans('cruds.caretaker.fields.emergency_contact') }}</label>
        <x-select-list class="form-control" id="emergency_contact" name="emergency_contact" :options="$this->listsForFields['emergency_contact']" wire:model="caretaker.emergency_contact_id" />
        <div class="validation-message">
            {{ $errors->first('caretaker.emergency_contact_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.caretaker.fields.emergency_contact_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.caretaker_profile_picture') ? 'invalid' : '' }}">
        <label class="form-label" for="profile_picture">{{ trans('cruds.caretaker.fields.profile_picture') }}</label>
        <x-dropzone id="profile_picture" name="profile_picture" action="{{ route('admin.caretakers.storeMedia') }}" collection-name="caretaker_profile_picture" max-file-size="4" max-width="4096" max-height="4096" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.caretaker_profile_picture') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.caretaker.fields.profile_picture_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('caretaker.gender') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.caretaker.fields.gender') }}</label>
        @foreach($this->listsForFields['gender'] as $key => $value)
            <label class="radio-label"><input type="radio" name="gender" wire:model="caretaker.gender" value="{{ $key }}">{{ $value }}</label>
        @endforeach
        <div class="validation-message">
            {{ $errors->first('caretaker.gender') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.caretaker.fields.gender_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.caretakers.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
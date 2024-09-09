<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('student.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.student.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="student.name">
        <div class="validation-message">
            {{ $errors->first('student.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('student.dob') ? 'invalid' : '' }}">
        <label class="form-label required" for="dob">{{ trans('cruds.student.fields.dob') }}</label>
        <x-date-picker class="form-control" required wire:model="student.dob" id="dob" name="dob" picker="date" />
        <div class="validation-message">
            {{ $errors->first('student.dob') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.dob_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('student.location') ? 'invalid' : '' }}">
        <label class="form-label" for="location">{{ trans('cruds.student.fields.location') }}</label>
        <input class="form-control" type="number" name="location" id="location" wire:model.defer="student.location" step="1">
        <div class="validation-message">
            {{ $errors->first('student.location') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.location_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('student.grade') ? 'invalid' : '' }}">
        <label class="form-label" for="grade">{{ trans('cruds.student.fields.grade') }}</label>
        <input class="form-control" type="text" name="grade" id="grade" wire:model.defer="student.grade">
        <div class="validation-message">
            {{ $errors->first('student.grade') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.grade_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('student.attendance_status') ? 'invalid' : '' }}">
        <label class="form-label" for="attendance_status">{{ trans('cruds.student.fields.attendance_status') }}</label>
        <input class="form-control" type="text" name="attendance_status" id="attendance_status" wire:model.defer="student.attendance_status">
        <div class="validation-message">
            {{ $errors->first('student.attendance_status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.attendance_status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('student.qr_code') ? 'invalid' : '' }}">
        <label class="form-label" for="qr_code">{{ trans('cruds.student.fields.qr_code') }}</label>
        <input class="form-control" type="text" name="qr_code" id="qr_code" wire:model.defer="student.qr_code">
        <div class="validation-message">
            {{ $errors->first('student.qr_code') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.qr_code_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('student.medical_condition') ? 'invalid' : '' }}">
        <label class="form-label" for="medical_condition">{{ trans('cruds.student.fields.medical_condition') }}</label>
        <input class="form-control" type="text" name="medical_condition" id="medical_condition" wire:model.defer="student.medical_condition">
        <div class="validation-message">
            {{ $errors->first('student.medical_condition') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.medical_condition_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('student.emergency_medication') ? 'invalid' : '' }}">
        <label class="form-label" for="emergency_medication">{{ trans('cruds.student.fields.emergency_medication') }}</label>
        <input class="form-control" type="text" name="emergency_medication" id="emergency_medication" wire:model.defer="student.emergency_medication">
        <div class="validation-message">
            {{ $errors->first('student.emergency_medication') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.emergency_medication_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('student.allergies') ? 'invalid' : '' }}">
        <label class="form-label" for="allergies">{{ trans('cruds.student.fields.allergies') }}</label>
        <input class="form-control" type="text" name="allergies" id="allergies" wire:model.defer="student.allergies">
        <div class="validation-message">
            {{ $errors->first('student.allergies') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.allergies_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('student.blood_group') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.student.fields.blood_group') }}</label>
        <select class="form-control" wire:model="student.blood_group">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['blood_group'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('student.blood_group') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.blood_group_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('vehicle') ? 'invalid' : '' }}">
        <label class="form-label" for="vehicle">{{ trans('cruds.student.fields.vehicle') }}</label>
        <x-select-list class="form-control" id="vehicle" name="vehicle" wire:model="vehicle" :options="$this->listsForFields['vehicle']" multiple />
        <div class="validation-message">
            {{ $errors->first('vehicle') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.vehicle_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.student_profile_picture') ? 'invalid' : '' }}">
        <label class="form-label" for="profile_picture">{{ trans('cruds.student.fields.profile_picture') }}</label>
        <x-dropzone id="profile_picture" name="profile_picture" action="{{ route('admin.students.storeMedia') }}" collection-name="student_profile_picture" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.student_profile_picture') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.profile_picture_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('student.gender') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.student.fields.gender') }}</label>
        @foreach($this->listsForFields['gender'] as $key => $value)
            <label class="radio-label"><input type="radio" name="gender" wire:model="student.gender" value="{{ $key }}">{{ $value }}</label>
        @endforeach
        <div class="validation-message">
            {{ $errors->first('student.gender') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.gender_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('student.school_id') ? 'invalid' : '' }}">
        <label class="form-label" for="school">{{ trans('cruds.student.fields.school') }}</label>
        <x-select-list class="form-control" id="school" name="school" :options="$this->listsForFields['school']" wire:model="student.school_id" />
        <div class="validation-message">
            {{ $errors->first('student.school_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.school_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
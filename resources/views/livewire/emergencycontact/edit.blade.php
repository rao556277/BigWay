<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('emergencycontact.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.emergencycontact.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="emergencycontact.name">
        <div class="validation-message">
            {{ $errors->first('emergencycontact.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.emergencycontact.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('emergencycontact.relationship') ? 'invalid' : '' }}">
        <label class="form-label required" for="relationship">{{ trans('cruds.emergencycontact.fields.relationship') }}</label>
        <input class="form-control" type="text" name="relationship" id="relationship" required wire:model.defer="emergencycontact.relationship">
        <div class="validation-message">
            {{ $errors->first('emergencycontact.relationship') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.emergencycontact.fields.relationship_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('emergencycontact.contact_1') ? 'invalid' : '' }}">
        <label class="form-label required" for="contact_1">{{ trans('cruds.emergencycontact.fields.contact_1') }}</label>
        <input class="form-control" type="number" name="contact_1" id="contact_1" required wire:model.defer="emergencycontact.contact_1" step="1">
        <div class="validation-message">
            {{ $errors->first('emergencycontact.contact_1') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.emergencycontact.fields.contact_1_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('emergencycontact.contact_2') ? 'invalid' : '' }}">
        <label class="form-label" for="contact_2">{{ trans('cruds.emergencycontact.fields.contact_2') }}</label>
        <input class="form-control" type="number" name="contact_2" id="contact_2" wire:model.defer="emergencycontact.contact_2" step="1">
        <div class="validation-message">
            {{ $errors->first('emergencycontact.contact_2') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.emergencycontact.fields.contact_2_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('emergencycontact.student_id') ? 'invalid' : '' }}">
        <label class="form-label" for="student">{{ trans('cruds.emergencycontact.fields.student') }}</label>
        <x-select-list class="form-control" id="student" name="student" :options="$this->listsForFields['student']" wire:model="emergencycontact.student_id" />
        <div class="validation-message">
            {{ $errors->first('emergencycontact.student_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.emergencycontact.fields.student_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.emergencycontacts.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
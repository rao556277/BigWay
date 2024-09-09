<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('guardian.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.guardian.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="guardian.name">
        <div class="validation-message">
            {{ $errors->first('guardian.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.guardian.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('guardian.address') ? 'invalid' : '' }}">
        <label class="form-label" for="address">{{ trans('cruds.guardian.fields.address') }}</label>
        <input class="form-control" type="text" name="address" id="address" wire:model.defer="guardian.address">
        <div class="validation-message">
            {{ $errors->first('guardian.address') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.guardian.fields.address_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('guardian.payment_details') ? 'invalid' : '' }}">
        <label class="form-label" for="payment_details">{{ trans('cruds.guardian.fields.payment_details') }}</label>
        <input class="form-control" type="text" name="payment_details" id="payment_details" wire:model.defer="guardian.payment_details">
        <div class="validation-message">
            {{ $errors->first('guardian.payment_details') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.guardian.fields.payment_details_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('guardian.verified') ? 'invalid' : '' }}">
        <label class="form-label" for="verified">{{ trans('cruds.guardian.fields.verified') }}</label>
        <input class="form-control" type="text" name="verified" id="verified" wire:model.defer="guardian.verified">
        <div class="validation-message">
            {{ $errors->first('guardian.verified') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.guardian.fields.verified_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.guardian_profile_picture') ? 'invalid' : '' }}">
        <label class="form-label" for="profile_picture">{{ trans('cruds.guardian.fields.profile_picture') }}</label>
        <x-dropzone id="profile_picture" name="profile_picture" action="{{ route('admin.guardians.storeMedia') }}" collection-name="guardian_profile_picture" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.guardian_profile_picture') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.guardian.fields.profile_picture_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('guardian.gender') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.guardian.fields.gender') }}</label>
        @foreach($this->listsForFields['gender'] as $key => $value)
            <label class="radio-label"><input type="radio" name="gender" wire:model="guardian.gender" value="{{ $key }}">{{ $value }}</label>
        @endforeach
        <div class="validation-message">
            {{ $errors->first('guardian.gender') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.guardian.fields.gender_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.guardians.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
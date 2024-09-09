<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('vendor.name') ? 'invalid' : '' }}">
        <label class="form-label" for="name">{{ trans('cruds.vendor.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" wire:model.defer="vendor.name">
        <div class="validation-message">
            {{ $errors->first('vendor.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.vendor.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('vendor.contact_details') ? 'invalid' : '' }}">
        <label class="form-label" for="contact_details">{{ trans('cruds.vendor.fields.contact_details') }}</label>
        <input class="form-control" type="text" name="contact_details" id="contact_details" wire:model.defer="vendor.contact_details">
        <div class="validation-message">
            {{ $errors->first('vendor.contact_details') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.vendor.fields.contact_details_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('vendor.contract_details') ? 'invalid' : '' }}">
        <label class="form-label" for="contract_details">{{ trans('cruds.vendor.fields.contract_details') }}</label>
        <input class="form-control" type="text" name="contract_details" id="contract_details" wire:model.defer="vendor.contract_details">
        <div class="validation-message">
            {{ $errors->first('vendor.contract_details') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.vendor.fields.contract_details_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('vendor.vendor_type') ? 'invalid' : '' }}">
        <label class="form-label" for="vendor_type">{{ trans('cruds.vendor.fields.vendor_type') }}</label>
        <input class="form-control" type="text" name="vendor_type" id="vendor_type" wire:model.defer="vendor.vendor_type">
        <div class="validation-message">
            {{ $errors->first('vendor.vendor_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.vendor.fields.vendor_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('vendor.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.vendor.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="vendor.user_id" />
        <div class="validation-message">
            {{ $errors->first('vendor.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.vendor.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.vendor_profile_picture') ? 'invalid' : '' }}">
        <label class="form-label" for="profile_picture">{{ trans('cruds.vendor.fields.profile_picture') }}</label>
        <x-dropzone id="profile_picture" name="profile_picture" action="{{ route('admin.vendors.storeMedia') }}" collection-name="vendor_profile_picture" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.vendor_profile_picture') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.vendor.fields.profile_picture_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('vendor.gender') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.vendor.fields.gender') }}</label>
        @foreach($this->listsForFields['gender'] as $key => $value)
            <label class="radio-label"><input type="radio" name="gender" wire:model="vendor.gender" value="{{ $key }}">{{ $value }}</label>
        @endforeach
        <div class="validation-message">
            {{ $errors->first('vendor.gender') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.vendor.fields.gender_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.vendors.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
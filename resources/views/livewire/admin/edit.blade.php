<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('admin.name') ? 'invalid' : '' }}">
        <label class="form-label" for="name">{{ trans('cruds.admin.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" wire:model.defer="admin.name">
        <div class="validation-message">
            {{ $errors->first('admin.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.admin.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('admin.permissions') ? 'invalid' : '' }}">
        <label class="form-label" for="permissions">{{ trans('cruds.admin.fields.permissions') }}</label>
        <input class="form-control" type="text" name="permissions" id="permissions" wire:model.defer="admin.permissions">
        <div class="validation-message">
            {{ $errors->first('admin.permissions') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.admin.fields.permissions_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('admin.role') ? 'invalid' : '' }}">
        <label class="form-label" for="role">{{ trans('cruds.admin.fields.role') }}</label>
        <input class="form-control" type="text" name="role" id="role" wire:model.defer="admin.role">
        <div class="validation-message">
            {{ $errors->first('admin.role') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.admin.fields.role_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('admin.blood_group') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.admin.fields.blood_group') }}</label>
        <select class="form-control" wire:model="admin.blood_group">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['blood_group'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('admin.blood_group') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.admin.fields.blood_group_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.admin_profile_picture') ? 'invalid' : '' }}">
        <label class="form-label" for="profile_picture">{{ trans('cruds.admin.fields.profile_picture') }}</label>
        <x-dropzone id="profile_picture" name="profile_picture" action="{{ route('admin.admins.storeMedia') }}" collection-name="admin_profile_picture" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.admin_profile_picture') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.admin.fields.profile_picture_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.admins.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
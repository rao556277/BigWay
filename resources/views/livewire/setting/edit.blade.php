<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('setting.logo_url') ? 'invalid' : '' }}">
        <label class="form-label" for="logo_url">{{ trans('cruds.setting.fields.logo_url') }}</label>
        <input class="form-control" type="text" name="logo_url" id="logo_url" wire:model.defer="setting.logo_url">
        <div class="validation-message">
            {{ $errors->first('setting.logo_url') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.logo_url_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.company_name') ? 'invalid' : '' }}">
        <label class="form-label required" for="company_name">{{ trans('cruds.setting.fields.company_name') }}</label>
        <input class="form-control" type="text" name="company_name" id="company_name" required wire:model.defer="setting.company_name">
        <div class="validation-message">
            {{ $errors->first('setting.company_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.company_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.currency') ? 'invalid' : '' }}">
        <label class="form-label" for="currency">{{ trans('cruds.setting.fields.currency') }}</label>
        <input class="form-control" type="text" name="currency" id="currency" wire:model.defer="setting.currency">
        <div class="validation-message">
            {{ $errors->first('setting.currency') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.currency_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.contact_email') ? 'invalid' : '' }}">
        <label class="form-label" for="contact_email">{{ trans('cruds.setting.fields.contact_email') }}</label>
        <input class="form-control" type="text" name="contact_email" id="contact_email" wire:model.defer="setting.contact_email">
        <div class="validation-message">
            {{ $errors->first('setting.contact_email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.contact_email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.contact_phone') ? 'invalid' : '' }}">
        <label class="form-label" for="contact_phone">{{ trans('cruds.setting.fields.contact_phone') }}</label>
        <input class="form-control" type="text" name="contact_phone" id="contact_phone" wire:model.defer="setting.contact_phone">
        <div class="validation-message">
            {{ $errors->first('setting.contact_phone') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.contact_phone_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.language') ? 'invalid' : '' }}">
        <label class="form-label" for="language">{{ trans('cruds.setting.fields.language') }}</label>
        <input class="form-control" type="text" name="language" id="language" wire:model.defer="setting.language">
        <div class="validation-message">
            {{ $errors->first('setting.language') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.language_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.maintenance_mode') ? 'invalid' : '' }}">
        <label class="form-label" for="maintenance_mode">{{ trans('cruds.setting.fields.maintenance_mode') }}</label>
        <input class="form-control" type="text" name="maintenance_mode" id="maintenance_mode" wire:model.defer="setting.maintenance_mode">
        <div class="validation-message">
            {{ $errors->first('setting.maintenance_mode') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.maintenance_mode_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.backup_frequency') ? 'invalid' : '' }}">
        <label class="form-label" for="backup_frequency">{{ trans('cruds.setting.fields.backup_frequency') }}</label>
        <input class="form-control" type="text" name="backup_frequency" id="backup_frequency" wire:model.defer="setting.backup_frequency">
        <div class="validation-message">
            {{ $errors->first('setting.backup_frequency') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.backup_frequency_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.backup_location') ? 'invalid' : '' }}">
        <label class="form-label" for="backup_location">{{ trans('cruds.setting.fields.backup_location') }}</label>
        <input class="form-control" type="text" name="backup_location" id="backup_location" wire:model.defer="setting.backup_location">
        <div class="validation-message">
            {{ $errors->first('setting.backup_location') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.backup_location_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.support_url') ? 'invalid' : '' }}">
        <label class="form-label" for="support_url">{{ trans('cruds.setting.fields.support_url') }}</label>
        <input class="form-control" type="text" name="support_url" id="support_url" wire:model.defer="setting.support_url">
        <div class="validation-message">
            {{ $errors->first('setting.support_url') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.support_url_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.social_media_links') ? 'invalid' : '' }}">
        <label class="form-label" for="social_media_links">{{ trans('cruds.setting.fields.social_media_links') }}</label>
        <input class="form-control" type="text" name="social_media_links" id="social_media_links" wire:model.defer="setting.social_media_links">
        <div class="validation-message">
            {{ $errors->first('setting.social_media_links') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.social_media_links_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.terms_url') ? 'invalid' : '' }}">
        <label class="form-label" for="terms_url">{{ trans('cruds.setting.fields.terms_url') }}</label>
        <input class="form-control" type="text" name="terms_url" id="terms_url" wire:model.defer="setting.terms_url">
        <div class="validation-message">
            {{ $errors->first('setting.terms_url') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.terms_url_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.privacy_policy_url') ? 'invalid' : '' }}">
        <label class="form-label" for="privacy_policy_url">{{ trans('cruds.setting.fields.privacy_policy_url') }}</label>
        <input class="form-control" type="text" name="privacy_policy_url" id="privacy_policy_url" wire:model.defer="setting.privacy_policy_url">
        <div class="validation-message">
            {{ $errors->first('setting.privacy_policy_url') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.privacy_policy_url_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.timezone') ? 'invalid' : '' }}">
        <label class="form-label" for="timezone">{{ trans('cruds.setting.fields.timezone') }}</label>
        <input class="form-control" type="text" name="timezone" id="timezone" wire:model.defer="setting.timezone">
        <div class="validation-message">
            {{ $errors->first('setting.timezone') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.timezone_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
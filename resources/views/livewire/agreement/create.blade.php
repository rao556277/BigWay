<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('agreement.party_type') ? 'invalid' : '' }}">
        <label class="form-label" for="party_type">{{ trans('cruds.agreement.fields.party_type') }}</label>
        <input class="form-control" type="text" name="party_type" id="party_type" wire:model.defer="agreement.party_type">
        <div class="validation-message">
            {{ $errors->first('agreement.party_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.agreement.fields.party_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('agreement.agreement_date') ? 'invalid' : '' }}">
        <label class="form-label" for="agreement_date">{{ trans('cruds.agreement.fields.agreement_date') }}</label>
        <x-date-picker class="form-control" wire:model="agreement.agreement_date" id="agreement_date" name="agreement_date" />
        <div class="validation-message">
            {{ $errors->first('agreement.agreement_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.agreement.fields.agreement_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('agreement.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.agreement.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="agreement.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('agreement.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.agreement.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('agreement.party') ? 'invalid' : '' }}">
        <label class="form-label" for="party">{{ trans('cruds.agreement.fields.party') }}</label>
        <input class="form-control" type="text" name="party" id="party" wire:model.defer="agreement.party">
        <div class="validation-message">
            {{ $errors->first('agreement.party') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.agreement.fields.party_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('agreement.terms') ? 'invalid' : '' }}">
        <label class="form-label" for="terms">{{ trans('cruds.agreement.fields.terms') }}</label>
        <input class="form-control" type="text" name="terms" id="terms" wire:model.defer="agreement.terms">
        <div class="validation-message">
            {{ $errors->first('agreement.terms') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.agreement.fields.terms_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('agreement.expiry_date') ? 'invalid' : '' }}">
        <label class="form-label" for="expiry_date">{{ trans('cruds.agreement.fields.expiry_date') }}</label>
        <x-date-picker class="form-control" wire:model="agreement.expiry_date" id="expiry_date" name="expiry_date" />
        <div class="validation-message">
            {{ $errors->first('agreement.expiry_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.agreement.fields.expiry_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('agreement.signature_image') ? 'invalid' : '' }}">
        <label class="form-label" for="signature_image">{{ trans('cruds.agreement.fields.signature_image') }}</label>
        <input class="form-control" type="text" name="signature_image" id="signature_image" wire:model.defer="agreement.signature_image">
        <div class="validation-message">
            {{ $errors->first('agreement.signature_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.agreement.fields.signature_image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('agreement.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.agreement.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="agreement.user_id" />
        <div class="validation-message">
            {{ $errors->first('agreement.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.agreement.fields.user_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.agreements.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
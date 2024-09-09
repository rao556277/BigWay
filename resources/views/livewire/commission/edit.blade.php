<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('commission.amount') ? 'invalid' : '' }}">
        <label class="form-label" for="amount">{{ trans('cruds.commission.fields.amount') }}</label>
        <input class="form-control" type="text" name="amount" id="amount" wire:model.defer="commission.amount">
        <div class="validation-message">
            {{ $errors->first('commission.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.commission.fields.amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('commission.date') ? 'invalid' : '' }}">
        <label class="form-label" for="date">{{ trans('cruds.commission.fields.date') }}</label>
        <x-date-picker class="form-control" wire:model="commission.date" id="date" name="date" />
        <div class="validation-message">
            {{ $errors->first('commission.date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.commission.fields.date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('commission.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.commission.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="commission.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('commission.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.commission.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('commission.commission_rate') ? 'invalid' : '' }}">
        <label class="form-label" for="commission_rate">{{ trans('cruds.commission.fields.commission_rate') }}</label>
        <input class="form-control" type="number" name="commission_rate" id="commission_rate" wire:model.defer="commission.commission_rate" step="0.01">
        <div class="validation-message">
            {{ $errors->first('commission.commission_rate') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.commission.fields.commission_rate_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('commission.driver_id') ? 'invalid' : '' }}">
        <label class="form-label" for="driver">{{ trans('cruds.commission.fields.driver') }}</label>
        <x-select-list class="form-control" id="driver" name="driver" :options="$this->listsForFields['driver']" wire:model="commission.driver_id" />
        <div class="validation-message">
            {{ $errors->first('commission.driver_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.commission.fields.driver_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.commissions.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
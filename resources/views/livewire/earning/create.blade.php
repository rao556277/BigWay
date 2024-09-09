<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('earning.amount') ? 'invalid' : '' }}">
        <label class="form-label required" for="amount">{{ trans('cruds.earning.fields.amount') }}</label>
        <input class="form-control" type="number" name="amount" id="amount" required wire:model.defer="earning.amount" step="0.01">
        <div class="validation-message">
            {{ $errors->first('earning.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.earning.fields.amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('earning.date') ? 'invalid' : '' }}">
        <label class="form-label" for="date">{{ trans('cruds.earning.fields.date') }}</label>
        <x-date-picker class="form-control" wire:model="earning.date" id="date" name="date" />
        <div class="validation-message">
            {{ $errors->first('earning.date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.earning.fields.date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('earning.payment_method') ? 'invalid' : '' }}">
        <label class="form-label required" for="payment_method">{{ trans('cruds.earning.fields.payment_method') }}</label>
        <input class="form-control" type="text" name="payment_method" id="payment_method" required wire:model.defer="earning.payment_method">
        <div class="validation-message">
            {{ $errors->first('earning.payment_method') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.earning.fields.payment_method_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('earning.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.earning.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="earning.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('earning.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.earning.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.earnings.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
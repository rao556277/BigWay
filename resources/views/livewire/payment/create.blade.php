<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('payment.transaction') ? 'invalid' : '' }}">
        <label class="form-label required" for="transaction">{{ trans('cruds.payment.fields.transaction') }}</label>
        <input class="form-control" type="text" name="transaction" id="transaction" required wire:model.defer="payment.transaction">
        <div class="validation-message">
            {{ $errors->first('payment.transaction') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.transaction_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.amount') ? 'invalid' : '' }}">
        <label class="form-label" for="amount">{{ trans('cruds.payment.fields.amount') }}</label>
        <input class="form-control" type="number" name="amount" id="amount" wire:model.defer="payment.amount" step="0.01">
        <div class="validation-message">
            {{ $errors->first('payment.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.payment_method') ? 'invalid' : '' }}">
        <label class="form-label" for="payment_method">{{ trans('cruds.payment.fields.payment_method') }}</label>
        <input class="form-control" type="text" name="payment_method" id="payment_method" wire:model.defer="payment.payment_method">
        <div class="validation-message">
            {{ $errors->first('payment.payment_method') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.payment_method_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.reference_number') ? 'invalid' : '' }}">
        <label class="form-label" for="reference_number">{{ trans('cruds.payment.fields.reference_number') }}</label>
        <input class="form-control" type="text" name="reference_number" id="reference_number" wire:model.defer="payment.reference_number">
        <div class="validation-message">
            {{ $errors->first('payment.reference_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.reference_number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.date') ? 'invalid' : '' }}">
        <label class="form-label" for="date">{{ trans('cruds.payment.fields.date') }}</label>
        <x-date-picker class="form-control" wire:model="payment.date" id="date" name="date" />
        <div class="validation-message">
            {{ $errors->first('payment.date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.guardian_id') ? 'invalid' : '' }}">
        <label class="form-label" for="guardian">{{ trans('cruds.payment.fields.guardian') }}</label>
        <x-select-list class="form-control" id="guardian" name="guardian" :options="$this->listsForFields['guardian']" wire:model="payment.guardian_id" />
        <div class="validation-message">
            {{ $errors->first('payment.guardian_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.guardian_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.student_id') ? 'invalid' : '' }}">
        <label class="form-label" for="student">{{ trans('cruds.payment.fields.student') }}</label>
        <x-select-list class="form-control" id="student" name="student" :options="$this->listsForFields['student']" wire:model="payment.student_id" />
        <div class="validation-message">
            {{ $errors->first('payment.student_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.student_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('route') ? 'invalid' : '' }}">
        <label class="form-label" for="route">{{ trans('cruds.payment.fields.route') }}</label>
        <x-select-list class="form-control" id="route" name="route" wire:model="route" :options="$this->listsForFields['route']" multiple />
        <div class="validation-message">
            {{ $errors->first('route') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.route_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
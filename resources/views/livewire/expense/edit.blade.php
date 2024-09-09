<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('expense.date') ? 'invalid' : '' }}">
        <label class="form-label" for="date">{{ trans('cruds.expense.fields.date') }}</label>
        <x-date-picker class="form-control" wire:model="expense.date" id="date" name="date" />
        <div class="validation-message">
            {{ $errors->first('expense.date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.expense.fields.date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('expense.amount') ? 'invalid' : '' }}">
        <label class="form-label" for="amount">{{ trans('cruds.expense.fields.amount') }}</label>
        <input class="form-control" type="number" name="amount" id="amount" wire:model.defer="expense.amount" step="0.01">
        <div class="validation-message">
            {{ $errors->first('expense.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.expense.fields.amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('expense.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.expense.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="expense.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('expense.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.expense.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('expense.expense_type') ? 'invalid' : '' }}">
        <label class="form-label" for="expense_type">{{ trans('cruds.expense.fields.expense_type') }}</label>
        <input class="form-control" type="text" name="expense_type" id="expense_type" wire:model.defer="expense.expense_type">
        <div class="validation-message">
            {{ $errors->first('expense.expense_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.expense.fields.expense_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('expense.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.expense.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="expense.user_id" />
        <div class="validation-message">
            {{ $errors->first('expense.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.expense.fields.user_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.expenses.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('cost.item_type') ? 'invalid' : '' }}">
        <label class="form-label required" for="item_type">{{ trans('cruds.cost.fields.item_type') }}</label>
        <input class="form-control" type="text" name="item_type" id="item_type" required wire:model.defer="cost.item_type">
        <div class="validation-message">
            {{ $errors->first('cost.item_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.cost.fields.item_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('cost.cost') ? 'invalid' : '' }}">
        <label class="form-label" for="cost">{{ trans('cruds.cost.fields.cost') }}</label>
        <input class="form-control" type="number" name="cost" id="cost" wire:model.defer="cost.cost" step="0.01">
        <div class="validation-message">
            {{ $errors->first('cost.cost') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.cost.fields.cost_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('cost.effective_date') ? 'invalid' : '' }}">
        <label class="form-label required" for="effective_date">{{ trans('cruds.cost.fields.effective_date') }}</label>
        <x-date-picker class="form-control" required wire:model="cost.effective_date" id="effective_date" name="effective_date" />
        <div class="validation-message">
            {{ $errors->first('cost.effective_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.cost.fields.effective_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('cost.end_date') ? 'invalid' : '' }}">
        <label class="form-label required" for="end_date">{{ trans('cruds.cost.fields.end_date') }}</label>
        <x-date-picker class="form-control" required wire:model="cost.end_date" id="end_date" name="end_date" />
        <div class="validation-message">
            {{ $errors->first('cost.end_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.cost.fields.end_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('cost.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.cost.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="cost.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('cost.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.cost.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('cost.vehicle_id') ? 'invalid' : '' }}">
        <label class="form-label" for="vehicle">{{ trans('cruds.cost.fields.vehicle') }}</label>
        <x-select-list class="form-control" id="vehicle" name="vehicle" :options="$this->listsForFields['vehicle']" wire:model="cost.vehicle_id" />
        <div class="validation-message">
            {{ $errors->first('cost.vehicle_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.cost.fields.vehicle_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.costs.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
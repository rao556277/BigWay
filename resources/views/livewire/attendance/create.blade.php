<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('attendance.route') ? 'invalid' : '' }}">
        <label class="form-label" for="route">{{ trans('cruds.attendance.fields.route') }}</label>
        <input class="form-control" type="number" name="route" id="route" wire:model.defer="attendance.route" step="1">
        <div class="validation-message">
            {{ $errors->first('attendance.route') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.attendance.fields.route_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('attendance.date') ? 'invalid' : '' }}">
        <label class="form-label" for="date">{{ trans('cruds.attendance.fields.date') }}</label>
        <x-date-picker class="form-control" wire:model="attendance.date" id="date" name="date" />
        <div class="validation-message">
            {{ $errors->first('attendance.date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.attendance.fields.date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('attendance.pickup_time') ? 'invalid' : '' }}">
        <label class="form-label" for="pickup_time">{{ trans('cruds.attendance.fields.pickup_time') }}</label>
        <x-date-picker class="form-control" wire:model="attendance.pickup_time" id="pickup_time" name="pickup_time" />
        <div class="validation-message">
            {{ $errors->first('attendance.pickup_time') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.attendance.fields.pickup_time_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('attendance.dropoff_time') ? 'invalid' : '' }}">
        <label class="form-label" for="dropoff_time">{{ trans('cruds.attendance.fields.dropoff_time') }}</label>
        <x-date-picker class="form-control" wire:model="attendance.dropoff_time" id="dropoff_time" name="dropoff_time" />
        <div class="validation-message">
            {{ $errors->first('attendance.dropoff_time') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.attendance.fields.dropoff_time_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('attendance.student_id') ? 'invalid' : '' }}">
        <label class="form-label" for="student">{{ trans('cruds.attendance.fields.student') }}</label>
        <x-select-list class="form-control" id="student" name="student" :options="$this->listsForFields['student']" wire:model="attendance.student_id" />
        <div class="validation-message">
            {{ $errors->first('attendance.student_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.attendance.fields.student_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.attendances.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
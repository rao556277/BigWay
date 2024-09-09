<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('booking.booking_date') ? 'invalid' : '' }}">
        <label class="form-label" for="booking_date">{{ trans('cruds.booking.fields.booking_date') }}</label>
        <x-date-picker class="form-control" wire:model="booking.booking_date" id="booking_date" name="booking_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('booking.booking_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.booking_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('booking.start_date') ? 'invalid' : '' }}">
        <label class="form-label" for="start_date">{{ trans('cruds.booking.fields.start_date') }}</label>
        <x-date-picker class="form-control" wire:model="booking.start_date" id="start_date" name="start_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('booking.start_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.start_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('booking.end_date') ? 'invalid' : '' }}">
        <label class="form-label" for="end_date">{{ trans('cruds.booking.fields.end_date') }}</label>
        <x-date-picker class="form-control" wire:model="booking.end_date" id="end_date" name="end_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('booking.end_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.end_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('booking.status') ? 'invalid' : '' }}">
        <label class="form-label" for="status">{{ trans('cruds.booking.fields.status') }}</label>
        <input class="form-control" type="text" name="status" id="status" wire:model.defer="booking.status">
        <div class="validation-message">
            {{ $errors->first('booking.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('booking.cost') ? 'invalid' : '' }}">
        <label class="form-label" for="cost">{{ trans('cruds.booking.fields.cost') }}</label>
        <input class="form-control" type="number" name="cost" id="cost" wire:model.defer="booking.cost" step="0.01">
        <div class="validation-message">
            {{ $errors->first('booking.cost') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.cost_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('booking.amount') ? 'invalid' : '' }}">
        <label class="form-label" for="amount">{{ trans('cruds.booking.fields.amount') }}</label>
        <input class="form-control" type="number" name="amount" id="amount" wire:model.defer="booking.amount" step="0.01">
        <div class="validation-message">
            {{ $errors->first('booking.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('booking.payment_status') ? 'invalid' : '' }}">
        <label class="form-label" for="payment_status">{{ trans('cruds.booking.fields.payment_status') }}</label>
        <input class="form-control" type="text" name="payment_status" id="payment_status" wire:model.defer="booking.payment_status">
        <div class="validation-message">
            {{ $errors->first('booking.payment_status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.payment_status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('booking.booking_status') ? 'invalid' : '' }}">
        <label class="form-label" for="booking_status">{{ trans('cruds.booking.fields.booking_status') }}</label>
        <input class="form-control" type="text" name="booking_status" id="booking_status" wire:model.defer="booking.booking_status">
        <div class="validation-message">
            {{ $errors->first('booking.booking_status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.booking_status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('booking.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.booking.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="booking.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('booking.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.booking.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" wire:model="user" :options="$this->listsForFields['user']" multiple />
        <div class="validation-message">
            {{ $errors->first('user') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('student') ? 'invalid' : '' }}">
        <label class="form-label" for="student">{{ trans('cruds.booking.fields.student') }}</label>
        <x-select-list class="form-control" id="student" name="student" wire:model="student" :options="$this->listsForFields['student']" multiple />
        <div class="validation-message">
            {{ $errors->first('student') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.student_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('vehicle') ? 'invalid' : '' }}">
        <label class="form-label" for="vehicle">{{ trans('cruds.booking.fields.vehicle') }}</label>
        <x-select-list class="form-control" id="vehicle" name="vehicle" wire:model="vehicle" :options="$this->listsForFields['vehicle']" multiple />
        <div class="validation-message">
            {{ $errors->first('vehicle') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.vehicle_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
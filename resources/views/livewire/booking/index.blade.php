<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('booking_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Booking" format="csv" />
                <livewire:excel-export model="Booking" format="xlsx" />
                <livewire:excel-export model="Booking" format="pdf" />
            @endif


            @can('booking_create')
                <x-csv-import route="{{ route('admin.bookings.csv.store') }}" />
            @endcan

        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.booking.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.booking.fields.booking_date') }}
                            @include('components.table.sort', ['field' => 'booking_date'])
                        </th>
                        <th>
                            {{ trans('cruds.booking.fields.start_date') }}
                            @include('components.table.sort', ['field' => 'start_date'])
                        </th>
                        <th>
                            {{ trans('cruds.booking.fields.end_date') }}
                            @include('components.table.sort', ['field' => 'end_date'])
                        </th>
                        <th>
                            {{ trans('cruds.booking.fields.status') }}
                            @include('components.table.sort', ['field' => 'status'])
                        </th>
                        <th>
                            {{ trans('cruds.booking.fields.cost') }}
                            @include('components.table.sort', ['field' => 'cost'])
                        </th>
                        <th>
                            {{ trans('cruds.booking.fields.amount') }}
                            @include('components.table.sort', ['field' => 'amount'])
                        </th>
                        <th>
                            {{ trans('cruds.booking.fields.payment_status') }}
                            @include('components.table.sort', ['field' => 'payment_status'])
                        </th>
                        <th>
                            {{ trans('cruds.booking.fields.booking_status') }}
                            @include('components.table.sort', ['field' => 'booking_status'])
                        </th>
                        <th>
                            {{ trans('cruds.booking.fields.description') }}
                            @include('components.table.sort', ['field' => 'description'])
                        </th>
                        <th>
                            {{ trans('cruds.booking.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.booking.fields.student') }}
                        </th>
                        <th>
                            {{ trans('cruds.booking.fields.vehicle') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $booking->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $booking->id }}
                            </td>
                            <td>
                                {{ $booking->booking_date }}
                            </td>
                            <td>
                                {{ $booking->start_date }}
                            </td>
                            <td>
                                {{ $booking->end_date }}
                            </td>
                            <td>
                                {{ $booking->status }}
                            </td>
                            <td>
                                {{ $booking->cost }}
                            </td>
                            <td>
                                {{ $booking->amount }}
                            </td>
                            <td>
                                {{ $booking->payment_status }}
                            </td>
                            <td>
                                {{ $booking->booking_status }}
                            </td>
                            <td>
                                {{ $booking->description }}
                            </td>
                            <td>
                                @foreach($booking->user as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($booking->student as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($booking->vehicle as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->vehicle_number }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('booking_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.bookings.show', $booking) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('booking_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.bookings.edit', $booking) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('booking_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $booking->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $bookings->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush
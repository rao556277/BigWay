<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('vehicle_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Vehicle" format="csv" />
                <livewire:excel-export model="Vehicle" format="xlsx" />
                <livewire:excel-export model="Vehicle" format="pdf" />
            @endif


            @can('vehicle_create')
                <x-csv-import route="{{ route('admin.vehicles.csv.store') }}" />
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
                            {{ trans('cruds.vehicle.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.vehicle_number') }}
                            @include('components.table.sort', ['field' => 'vehicle_number'])
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.capacity') }}
                            @include('components.table.sort', ['field' => 'capacity'])
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.caretaker') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.driver') }}
                            @include('components.table.sort', ['field' => 'driver.name'])
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.route') }}
                            @include('components.table.sort', ['field' => 'route.route_name'])
                        </th>
                        <th>
                            {{ trans('cruds.vehicle.fields.vehicle_type') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($vehicles as $vehicle)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $vehicle->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $vehicle->id }}
                            </td>
                            <td>
                                {{ $vehicle->vehicle_number }}
                            </td>
                            <td>
                                {{ $vehicle->capacity }}
                            </td>
                            <td>
                                @foreach($vehicle->caretaker as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if($vehicle->driver)
                                    <span class="badge badge-relationship">{{ $vehicle->driver->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($vehicle->route)
                                    <span class="badge badge-relationship">{{ $vehicle->route->route_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @foreach($vehicle->vehicleType as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('vehicle_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.vehicles.show', $vehicle) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('vehicle_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.vehicles.edit', $vehicle) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('vehicle_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $vehicle->id }})" wire:loading.attr="disabled">
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
            {{ $vehicles->links() }}
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
<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('route_history_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="RouteHistory" format="csv" />
                <livewire:excel-export model="RouteHistory" format="xlsx" />
                <livewire:excel-export model="RouteHistory" format="pdf" />
            @endif


            @can('route_history_create')
                <x-csv-import route="{{ route('admin.route-histories.csv.store') }}" />
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
                            {{ trans('cruds.routeHistory.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.routeHistory.fields.vehicle') }}
                            @include('components.table.sort', ['field' => 'vehicle'])
                        </th>
                        <th>
                            {{ trans('cruds.routeHistory.fields.start_time') }}
                            @include('components.table.sort', ['field' => 'start_time'])
                        </th>
                        <th>
                            {{ trans('cruds.routeHistory.fields.end_time') }}
                            @include('components.table.sort', ['field' => 'end_time'])
                        </th>
                        <th>
                            {{ trans('cruds.routeHistory.fields.distance_travelled') }}
                            @include('components.table.sort', ['field' => 'distance_travelled'])
                        </th>
                        <th>
                            {{ trans('cruds.routeHistory.fields.vendor') }}
                        </th>
                        <th>
                            {{ trans('cruds.routeHistory.fields.vehicle_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.routeHistory.fields.route') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($routeHistories as $routeHistory)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $routeHistory->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $routeHistory->id }}
                            </td>
                            <td>
                                {{ $routeHistory->vehicle }}
                            </td>
                            <td>
                                {{ $routeHistory->start_time }}
                            </td>
                            <td>
                                {{ $routeHistory->end_time }}
                            </td>
                            <td>
                                {{ $routeHistory->distance_travelled }}
                            </td>
                            <td>
                                @foreach($routeHistory->vendor as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($routeHistory->vehicleType as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($routeHistory->route as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->route_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('route_history_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.route-histories.show', $routeHistory) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('route_history_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.route-histories.edit', $routeHistory) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('route_history_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $routeHistory->id }})" wire:loading.attr="disabled">
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
            {{ $routeHistories->links() }}
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
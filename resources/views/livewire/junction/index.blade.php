<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('junction_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Junction" format="csv" />
                <livewire:excel-export model="Junction" format="xlsx" />
                <livewire:excel-export model="Junction" format="pdf" />
            @endif


            @can('junction_create')
                <x-csv-import route="{{ route('admin.junctions.csv.store') }}" />
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
                            {{ trans('cruds.junction.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.junction.fields.junction_name') }}
                            @include('components.table.sort', ['field' => 'junction_name'])
                        </th>
                        <th>
                            {{ trans('cruds.junction.fields.arrival_time') }}
                            @include('components.table.sort', ['field' => 'arrival_time'])
                        </th>
                        <th>
                            {{ trans('cruds.junction.fields.departure_time') }}
                            @include('components.table.sort', ['field' => 'departure_time'])
                        </th>
                        <th>
                            {{ trans('cruds.junction.fields.distance_from_last_location') }}
                            @include('components.table.sort', ['field' => 'distance_from_last_location'])
                        </th>
                        <th>
                            {{ trans('cruds.junction.fields.location') }}
                            @include('components.table.sort', ['field' => 'location.user'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($junctions as $junction)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $junction->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $junction->id }}
                            </td>
                            <td>
                                {{ $junction->junction_name }}
                            </td>
                            <td>
                                {{ $junction->arrival_time }}
                            </td>
                            <td>
                                {{ $junction->departure_time }}
                            </td>
                            <td>
                                {{ $junction->distance_from_last_location }}
                            </td>
                            <td>
                                @if($junction->location)
                                    <span class="badge badge-relationship">{{ $junction->location->user ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('junction_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.junctions.show', $junction) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('junction_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.junctions.edit', $junction) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('junction_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $junction->id }})" wire:loading.attr="disabled">
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
            {{ $junctions->links() }}
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
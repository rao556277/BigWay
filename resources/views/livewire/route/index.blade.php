<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('route_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Route" format="csv" />
                <livewire:excel-export model="Route" format="xlsx" />
                <livewire:excel-export model="Route" format="pdf" />
            @endif


            @can('route_create')
                <x-csv-import route="{{ route('admin.routes.csv.store') }}" />
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
                            {{ trans('cruds.route.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.route.fields.route_name') }}
                            @include('components.table.sort', ['field' => 'route_name'])
                        </th>
                        <th>
                            {{ trans('cruds.route.fields.start_location_type') }}
                            @include('components.table.sort', ['field' => 'start_location_type'])
                        </th>
                        <th>
                            {{ trans('cruds.route.fields.start_location') }}
                            @include('components.table.sort', ['field' => 'start_location'])
                        </th>
                        <th>
                            {{ trans('cruds.route.fields.end_location_type') }}
                            @include('components.table.sort', ['field' => 'end_location_type'])
                        </th>
                        <th>
                            {{ trans('cruds.route.fields.end_location') }}
                            @include('components.table.sort', ['field' => 'end_location'])
                        </th>
                        <th>
                            {{ trans('cruds.route.fields.total_distance') }}
                            @include('components.table.sort', ['field' => 'total_distance'])
                        </th>
                        <th>
                            {{ trans('cruds.route.fields.estimated_time') }}
                            @include('components.table.sort', ['field' => 'estimated_time'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($routes as $route)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $route->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $route->id }}
                            </td>
                            <td>
                                {{ $route->route_name }}
                            </td>
                            <td>
                                {{ $route->start_location_type }}
                            </td>
                            <td>
                                {{ $route->start_location }}
                            </td>
                            <td>
                                {{ $route->end_location_type }}
                            </td>
                            <td>
                                {{ $route->end_location }}
                            </td>
                            <td>
                                {{ $route->total_distance }}
                            </td>
                            <td>
                                {{ $route->estimated_time }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('route_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.routes.show', $route) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('route_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.routes.edit', $route) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('route_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $route->id }})" wire:loading.attr="disabled">
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
            {{ $routes->links() }}
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
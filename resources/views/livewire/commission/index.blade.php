<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('commission_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Commission" format="csv" />
                <livewire:excel-export model="Commission" format="xlsx" />
                <livewire:excel-export model="Commission" format="pdf" />
            @endif


            @can('commission_create')
                <x-csv-import route="{{ route('admin.commissions.csv.store') }}" />
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
                            {{ trans('cruds.commission.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.commission.fields.amount') }}
                            @include('components.table.sort', ['field' => 'amount'])
                        </th>
                        <th>
                            {{ trans('cruds.commission.fields.date') }}
                            @include('components.table.sort', ['field' => 'date'])
                        </th>
                        <th>
                            {{ trans('cruds.commission.fields.description') }}
                            @include('components.table.sort', ['field' => 'description'])
                        </th>
                        <th>
                            {{ trans('cruds.commission.fields.commission_rate') }}
                            @include('components.table.sort', ['field' => 'commission_rate'])
                        </th>
                        <th>
                            {{ trans('cruds.commission.fields.driver') }}
                            @include('components.table.sort', ['field' => 'driver.name'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($commissions as $commission)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $commission->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $commission->id }}
                            </td>
                            <td>
                                {{ $commission->amount }}
                            </td>
                            <td>
                                {{ $commission->date }}
                            </td>
                            <td>
                                {{ $commission->description }}
                            </td>
                            <td>
                                {{ $commission->commission_rate }}
                            </td>
                            <td>
                                @if($commission->driver)
                                    <span class="badge badge-relationship">{{ $commission->driver->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('commission_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.commissions.show', $commission) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('commission_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.commissions.edit', $commission) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('commission_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $commission->id }})" wire:loading.attr="disabled">
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
            {{ $commissions->links() }}
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
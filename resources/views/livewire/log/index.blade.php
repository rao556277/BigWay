<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('log_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Log" format="csv" />
                <livewire:excel-export model="Log" format="xlsx" />
                <livewire:excel-export model="Log" format="pdf" />
            @endif


            @can('log_create')
                <x-csv-import route="{{ route('admin.logs.csv.store') }}" />
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
                            {{ trans('cruds.log.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.log.fields.entity_type') }}
                            @include('components.table.sort', ['field' => 'entity_type'])
                        </th>
                        <th>
                            {{ trans('cruds.log.fields.entity') }}
                            @include('components.table.sort', ['field' => 'entity'])
                        </th>
                        <th>
                            {{ trans('cruds.log.fields.action') }}
                            @include('components.table.sort', ['field' => 'action'])
                        </th>
                        <th>
                            {{ trans('cruds.log.fields.timezone') }}
                            @include('components.table.sort', ['field' => 'timezone'])
                        </th>
                        <th>
                            {{ trans('cruds.log.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.log.fields.performed_by') }}
                            @include('components.table.sort', ['field' => 'performed_by.name'])
                        </th>
                        <th>
                            {{ trans('cruds.log.fields.created_by') }}
                            @include('components.table.sort', ['field' => 'created_by.name'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $log->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $log->id }}
                            </td>
                            <td>
                                {{ $log->entity_type }}
                            </td>
                            <td>
                                {{ $log->entity }}
                            </td>
                            <td>
                                {{ $log->action }}
                            </td>
                            <td>
                                {{ $log->timezone }}
                            </td>
                            <td>
                                @foreach($log->user as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if($log->performedBy)
                                    <span class="badge badge-relationship">{{ $log->performedBy->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($log->createdBy)
                                    <span class="badge badge-relationship">{{ $log->createdBy->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('log_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.logs.show', $log) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('log_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.logs.edit', $log) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('log_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $log->id }})" wire:loading.attr="disabled">
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
            {{ $logs->links() }}
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
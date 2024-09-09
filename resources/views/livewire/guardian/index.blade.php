<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('guardian_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Guardian" format="csv" />
                <livewire:excel-export model="Guardian" format="xlsx" />
                <livewire:excel-export model="Guardian" format="pdf" />
            @endif


            @can('guardian_create')
                <x-csv-import route="{{ route('admin.guardians.csv.store') }}" />
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
                            {{ trans('cruds.guardian.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.guardian.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.guardian.fields.address') }}
                            @include('components.table.sort', ['field' => 'address'])
                        </th>
                        <th>
                            {{ trans('cruds.guardian.fields.payment_details') }}
                            @include('components.table.sort', ['field' => 'payment_details'])
                        </th>
                        <th>
                            {{ trans('cruds.guardian.fields.verified') }}
                            @include('components.table.sort', ['field' => 'verified'])
                        </th>
                        <th>
                            {{ trans('cruds.guardian.fields.profile_picture') }}
                        </th>
                        <th>
                            {{ trans('cruds.guardian.fields.gender') }}
                            @include('components.table.sort', ['field' => 'gender'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($guardians as $guardian)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $guardian->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $guardian->id }}
                            </td>
                            <td>
                                {{ $guardian->name }}
                            </td>
                            <td>
                                {{ $guardian->address }}
                            </td>
                            <td>
                                {{ $guardian->payment_details }}
                            </td>
                            <td>
                                {{ $guardian->verified }}
                            </td>
                            <td>
                                @foreach($guardian->profile_picture as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $guardian->gender_label }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('guardian_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.guardians.show', $guardian) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('guardian_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.guardians.edit', $guardian) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('guardian_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $guardian->id }})" wire:loading.attr="disabled">
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
            {{ $guardians->links() }}
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
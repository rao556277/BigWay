<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('vendor_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Vendor" format="csv" />
                <livewire:excel-export model="Vendor" format="xlsx" />
                <livewire:excel-export model="Vendor" format="pdf" />
            @endif


            @can('vendor_create')
                <x-csv-import route="{{ route('admin.vendors.csv.store') }}" />
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
                            {{ trans('cruds.vendor.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.contact_details') }}
                            @include('components.table.sort', ['field' => 'contact_details'])
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.contract_details') }}
                            @include('components.table.sort', ['field' => 'contract_details'])
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.vendor_type') }}
                            @include('components.table.sort', ['field' => 'vendor_type'])
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.user') }}
                            @include('components.table.sort', ['field' => 'user.name'])
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.profile_picture') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.gender') }}
                            @include('components.table.sort', ['field' => 'gender'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($vendors as $vendor)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $vendor->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $vendor->id }}
                            </td>
                            <td>
                                {{ $vendor->name }}
                            </td>
                            <td>
                                {{ $vendor->contact_details }}
                            </td>
                            <td>
                                {{ $vendor->contract_details }}
                            </td>
                            <td>
                                {{ $vendor->vendor_type }}
                            </td>
                            <td>
                                @if($vendor->user)
                                    <span class="badge badge-relationship">{{ $vendor->user->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @foreach($vendor->profile_picture as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $vendor->gender_label }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('vendor_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.vendors.show', $vendor) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('vendor_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.vendors.edit', $vendor) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('vendor_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $vendor->id }})" wire:loading.attr="disabled">
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
            {{ $vendors->links() }}
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
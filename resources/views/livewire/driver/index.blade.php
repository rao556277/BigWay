<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('driver_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Driver" format="csv" />
                <livewire:excel-export model="Driver" format="xlsx" />
                <livewire:excel-export model="Driver" format="pdf" />
            @endif


            @can('driver_create')
                <x-csv-import route="{{ route('admin.drivers.csv.store') }}" />
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
                            {{ trans('cruds.driver.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.license_number') }}
                            @include('components.table.sort', ['field' => 'license_number'])
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.address') }}
                            @include('components.table.sort', ['field' => 'address'])
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.cnic') }}
                            @include('components.table.sort', ['field' => 'cnic'])
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.medical_condition') }}
                            @include('components.table.sort', ['field' => 'medical_condition'])
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.emergency_medication') }}
                            @include('components.table.sort', ['field' => 'emergency_medication'])
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.allergies') }}
                            @include('components.table.sort', ['field' => 'allergies'])
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.hire_date') }}
                            @include('components.table.sort', ['field' => 'hire_date'])
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.image_url') }}
                            @include('components.table.sort', ['field' => 'image_url'])
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.blood_group') }}
                            @include('components.table.sort', ['field' => 'blood_group'])
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.profile_picture') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.dob') }}
                            @include('components.table.sort', ['field' => 'dob'])
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.license_expiry_date') }}
                            @include('components.table.sort', ['field' => 'license_expiry_date'])
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.gender') }}
                            @include('components.table.sort', ['field' => 'gender'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($drivers as $driver)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $driver->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $driver->id }}
                            </td>
                            <td>
                                {{ $driver->name }}
                            </td>
                            <td>
                                {{ $driver->license_number }}
                            </td>
                            <td>
                                {{ $driver->address }}
                            </td>
                            <td>
                                {{ $driver->cnic }}
                            </td>
                            <td>
                                {{ $driver->medical_condition }}
                            </td>
                            <td>
                                {{ $driver->emergency_medication }}
                            </td>
                            <td>
                                {{ $driver->allergies }}
                            </td>
                            <td>
                                {{ $driver->hire_date }}
                            </td>
                            <td>
                                {{ $driver->image_url }}
                            </td>
                            <td>
                                {{ $driver->blood_group_label }}
                            </td>
                            <td>
                                @foreach($driver->profile_picture as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $driver->dob }}
                            </td>
                            <td>
                                {{ $driver->license_expiry_date }}
                            </td>
                            <td>
                                {{ $driver->gender_label }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('driver_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.drivers.show', $driver) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('driver_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.drivers.edit', $driver) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('driver_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $driver->id }})" wire:loading.attr="disabled">
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
            {{ $drivers->links() }}
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
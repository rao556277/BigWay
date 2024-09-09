<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('caretaker_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Caretaker" format="csv" />
                <livewire:excel-export model="Caretaker" format="xlsx" />
                <livewire:excel-export model="Caretaker" format="pdf" />
            @endif


            @can('caretaker_create')
                <x-csv-import route="{{ route('admin.caretakers.csv.store') }}" />
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
                            {{ trans('cruds.caretaker.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.caretaker.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.caretaker.fields.address') }}
                            @include('components.table.sort', ['field' => 'address'])
                        </th>
                        <th>
                            {{ trans('cruds.caretaker.fields.cnic') }}
                            @include('components.table.sort', ['field' => 'cnic'])
                        </th>
                        <th>
                            {{ trans('cruds.caretaker.fields.image_url') }}
                            @include('components.table.sort', ['field' => 'image_url'])
                        </th>
                        <th>
                            {{ trans('cruds.caretaker.fields.medical_condition') }}
                            @include('components.table.sort', ['field' => 'medical_condition'])
                        </th>
                        <th>
                            {{ trans('cruds.caretaker.fields.emergency_medication') }}
                            @include('components.table.sort', ['field' => 'emergency_medication'])
                        </th>
                        <th>
                            {{ trans('cruds.caretaker.fields.allergies') }}
                            @include('components.table.sort', ['field' => 'allergies'])
                        </th>
                        <th>
                            {{ trans('cruds.caretaker.fields.employment_date') }}
                            @include('components.table.sort', ['field' => 'employment_date'])
                        </th>
                        <th>
                            {{ trans('cruds.caretaker.fields.date_of_birth') }}
                            @include('components.table.sort', ['field' => 'date_of_birth'])
                        </th>
                        <th>
                            {{ trans('cruds.caretaker.fields.blood_group') }}
                            @include('components.table.sort', ['field' => 'blood_group'])
                        </th>
                        <th>
                            {{ trans('cruds.caretaker.fields.vehicle_type') }}
                            @include('components.table.sort', ['field' => 'vehicle_type.name'])
                        </th>
                        <th>
                            {{ trans('cruds.caretaker.fields.emergency_contact') }}
                            @include('components.table.sort', ['field' => 'emergency_contact.name'])
                        </th>
                        <th>
                            {{ trans('cruds.caretaker.fields.profile_picture') }}
                        </th>
                        <th>
                            {{ trans('cruds.caretaker.fields.gender') }}
                            @include('components.table.sort', ['field' => 'gender'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($caretakers as $caretaker)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $caretaker->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $caretaker->id }}
                            </td>
                            <td>
                                {{ $caretaker->name }}
                            </td>
                            <td>
                                {{ $caretaker->address }}
                            </td>
                            <td>
                                {{ $caretaker->cnic }}
                            </td>
                            <td>
                                {{ $caretaker->image_url }}
                            </td>
                            <td>
                                {{ $caretaker->medical_condition }}
                            </td>
                            <td>
                                {{ $caretaker->emergency_medication }}
                            </td>
                            <td>
                                {{ $caretaker->allergies }}
                            </td>
                            <td>
                                {{ $caretaker->employment_date }}
                            </td>
                            <td>
                                {{ $caretaker->date_of_birth }}
                            </td>
                            <td>
                                {{ $caretaker->blood_group_label }}
                            </td>
                            <td>
                                @if($caretaker->vehicleType)
                                    <span class="badge badge-relationship">{{ $caretaker->vehicleType->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($caretaker->emergencyContact)
                                    <span class="badge badge-relationship">{{ $caretaker->emergencyContact->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @foreach($caretaker->profile_picture as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $caretaker->gender_label }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('caretaker_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.caretakers.show', $caretaker) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('caretaker_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.caretakers.edit', $caretaker) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('caretaker_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $caretaker->id }})" wire:loading.attr="disabled">
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
            {{ $caretakers->links() }}
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
<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('student_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Student" format="csv" />
                <livewire:excel-export model="Student" format="xlsx" />
                <livewire:excel-export model="Student" format="pdf" />
            @endif


            @can('student_create')
                <x-csv-import route="{{ route('admin.students.csv.store') }}" />
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
                            {{ trans('cruds.student.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.dob') }}
                            @include('components.table.sort', ['field' => 'dob'])
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.location') }}
                            @include('components.table.sort', ['field' => 'location'])
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.grade') }}
                            @include('components.table.sort', ['field' => 'grade'])
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.attendance_status') }}
                            @include('components.table.sort', ['field' => 'attendance_status'])
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.qr_code') }}
                            @include('components.table.sort', ['field' => 'qr_code'])
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.medical_condition') }}
                            @include('components.table.sort', ['field' => 'medical_condition'])
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.emergency_medication') }}
                            @include('components.table.sort', ['field' => 'emergency_medication'])
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.allergies') }}
                            @include('components.table.sort', ['field' => 'allergies'])
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.blood_group') }}
                            @include('components.table.sort', ['field' => 'blood_group'])
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.vehicle') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.profile_picture') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.school') }}
                            @include('components.table.sort', ['field' => 'school.name'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $student->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $student->id }}
                            </td>
                            <td>
                                {{ $student->name }}
                            </td>
                            <td>
                                {{ $student->dob }}
                            </td>
                            <td>
                                {{ $student->location }}
                            </td>
                            <td>
                                {{ $student->grade }}
                            </td>
                            <td>
                                {{ $student->attendance_status }}
                            </td>
                            <td>
                                {{ $student->qr_code }}
                            </td>
                            <td>
                                {{ $student->medical_condition }}
                            </td>
                            <td>
                                {{ $student->emergency_medication }}
                            </td>
                            <td>
                                {{ $student->allergies }}
                            </td>
                            <td>
                                {{ $student->blood_group_label }}
                            </td>
                            <td>
                                @foreach($student->vehicle as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->vehicle_number }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($student->profile_picture as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @if($student->school)
                                    <span class="badge badge-relationship">{{ $student->school->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('student_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.students.show', $student) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('student_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.students.edit', $student) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('student_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $student->id }})" wire:loading.attr="disabled">
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
            {{ $students->links() }}
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
<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('agreement_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Agreement" format="csv" />
                <livewire:excel-export model="Agreement" format="xlsx" />
                <livewire:excel-export model="Agreement" format="pdf" />
            @endif


            @can('agreement_create')
                <x-csv-import route="{{ route('admin.agreements.csv.store') }}" />
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
                            {{ trans('cruds.agreement.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.agreement.fields.party_type') }}
                            @include('components.table.sort', ['field' => 'party_type'])
                        </th>
                        <th>
                            {{ trans('cruds.agreement.fields.agreement_date') }}
                            @include('components.table.sort', ['field' => 'agreement_date'])
                        </th>
                        <th>
                            {{ trans('cruds.agreement.fields.description') }}
                            @include('components.table.sort', ['field' => 'description'])
                        </th>
                        <th>
                            {{ trans('cruds.agreement.fields.party') }}
                            @include('components.table.sort', ['field' => 'party'])
                        </th>
                        <th>
                            {{ trans('cruds.agreement.fields.terms') }}
                            @include('components.table.sort', ['field' => 'terms'])
                        </th>
                        <th>
                            {{ trans('cruds.agreement.fields.expiry_date') }}
                            @include('components.table.sort', ['field' => 'expiry_date'])
                        </th>
                        <th>
                            {{ trans('cruds.agreement.fields.signature_image') }}
                            @include('components.table.sort', ['field' => 'signature_image'])
                        </th>
                        <th>
                            {{ trans('cruds.agreement.fields.user') }}
                            @include('components.table.sort', ['field' => 'user.name'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($agreements as $agreement)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $agreement->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $agreement->id }}
                            </td>
                            <td>
                                {{ $agreement->party_type }}
                            </td>
                            <td>
                                {{ $agreement->agreement_date }}
                            </td>
                            <td>
                                {{ $agreement->description }}
                            </td>
                            <td>
                                {{ $agreement->party }}
                            </td>
                            <td>
                                {{ $agreement->terms }}
                            </td>
                            <td>
                                {{ $agreement->expiry_date }}
                            </td>
                            <td>
                                {{ $agreement->signature_image }}
                            </td>
                            <td>
                                @if($agreement->user)
                                    <span class="badge badge-relationship">{{ $agreement->user->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('agreement_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.agreements.show', $agreement) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('agreement_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.agreements.edit', $agreement) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('agreement_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $agreement->id }})" wire:loading.attr="disabled">
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
            {{ $agreements->links() }}
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
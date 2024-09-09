<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('payment_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Payment" format="csv" />
                <livewire:excel-export model="Payment" format="xlsx" />
                <livewire:excel-export model="Payment" format="pdf" />
            @endif


            @can('payment_create')
                <x-csv-import route="{{ route('admin.payments.csv.store') }}" />
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
                            {{ trans('cruds.payment.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.transaction') }}
                            @include('components.table.sort', ['field' => 'transaction'])
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.amount') }}
                            @include('components.table.sort', ['field' => 'amount'])
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.payment_method') }}
                            @include('components.table.sort', ['field' => 'payment_method'])
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.reference_number') }}
                            @include('components.table.sort', ['field' => 'reference_number'])
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.date') }}
                            @include('components.table.sort', ['field' => 'date'])
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.guardian') }}
                            @include('components.table.sort', ['field' => 'guardian.name'])
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.student') }}
                            @include('components.table.sort', ['field' => 'student.name'])
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.route') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($payments as $payment)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $payment->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $payment->id }}
                            </td>
                            <td>
                                {{ $payment->transaction }}
                            </td>
                            <td>
                                {{ $payment->amount }}
                            </td>
                            <td>
                                {{ $payment->payment_method }}
                            </td>
                            <td>
                                {{ $payment->reference_number }}
                            </td>
                            <td>
                                {{ $payment->date }}
                            </td>
                            <td>
                                @if($payment->guardian)
                                    <span class="badge badge-relationship">{{ $payment->guardian->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($payment->student)
                                    <span class="badge badge-relationship">{{ $payment->student->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @foreach($payment->route as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->route_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('payment_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.payments.show', $payment) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('payment_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.payments.edit', $payment) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('payment_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $payment->id }})" wire:loading.attr="disabled">
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
            {{ $payments->links() }}
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
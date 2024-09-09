<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('setting_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Setting" format="csv" />
                <livewire:excel-export model="Setting" format="xlsx" />
                <livewire:excel-export model="Setting" format="pdf" />
            @endif


            @can('setting_create')
                <x-csv-import route="{{ route('admin.settings.csv.store') }}" />
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
                            {{ trans('cruds.setting.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.logo_url') }}
                            @include('components.table.sort', ['field' => 'logo_url'])
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.company_name') }}
                            @include('components.table.sort', ['field' => 'company_name'])
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.currency') }}
                            @include('components.table.sort', ['field' => 'currency'])
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.contact_email') }}
                            @include('components.table.sort', ['field' => 'contact_email'])
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.contact_phone') }}
                            @include('components.table.sort', ['field' => 'contact_phone'])
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.language') }}
                            @include('components.table.sort', ['field' => 'language'])
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.maintenance_mode') }}
                            @include('components.table.sort', ['field' => 'maintenance_mode'])
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.backup_frequency') }}
                            @include('components.table.sort', ['field' => 'backup_frequency'])
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.backup_location') }}
                            @include('components.table.sort', ['field' => 'backup_location'])
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.support_url') }}
                            @include('components.table.sort', ['field' => 'support_url'])
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.social_media_links') }}
                            @include('components.table.sort', ['field' => 'social_media_links'])
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.terms_url') }}
                            @include('components.table.sort', ['field' => 'terms_url'])
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.privacy_policy_url') }}
                            @include('components.table.sort', ['field' => 'privacy_policy_url'])
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.timezone') }}
                            @include('components.table.sort', ['field' => 'timezone'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($settings as $setting)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $setting->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $setting->id }}
                            </td>
                            <td>
                                {{ $setting->logo_url }}
                            </td>
                            <td>
                                {{ $setting->company_name }}
                            </td>
                            <td>
                                {{ $setting->currency }}
                            </td>
                            <td>
                                {{ $setting->contact_email }}
                            </td>
                            <td>
                                {{ $setting->contact_phone }}
                            </td>
                            <td>
                                {{ $setting->language }}
                            </td>
                            <td>
                                {{ $setting->maintenance_mode }}
                            </td>
                            <td>
                                {{ $setting->backup_frequency }}
                            </td>
                            <td>
                                {{ $setting->backup_location }}
                            </td>
                            <td>
                                {{ $setting->support_url }}
                            </td>
                            <td>
                                {{ $setting->social_media_links }}
                            </td>
                            <td>
                                {{ $setting->terms_url }}
                            </td>
                            <td>
                                {{ $setting->privacy_policy_url }}
                            </td>
                            <td>
                                {{ $setting->timezone }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('setting_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.settings.show', $setting) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('setting_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.settings.edit', $setting) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('setting_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $setting->id }})" wire:loading.attr="disabled">
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
            {{ $settings->links() }}
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
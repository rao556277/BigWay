<?php

namespace App\Http\Livewire\Driver;

use App\Models\Driver;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Driver $driver;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
                ->update(['model_id' => $this->driver->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Driver $driver)
    {
        $this->driver = $driver;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.driver.create');
    }

    public function submit()
    {
        $this->validate();

        $this->driver->save();
        $this->syncMedia();

        return redirect()->route('admin.drivers.index');
    }

    protected function rules(): array
    {
        return [
            'driver.name' => [
                'string',
                'required',
            ],
            'driver.license_number' => [
                'string',
                'nullable',
            ],
            'driver.address' => [
                'string',
                'nullable',
            ],
            'driver.cnic' => [
                'string',
                'nullable',
            ],
            'driver.medical_condition' => [
                'string',
                'nullable',
            ],
            'driver.emergency_medication' => [
                'string',
                'nullable',
            ],
            'driver.allergies' => [
                'string',
                'nullable',
            ],
            'driver.hire_date' => [
                'string',
                'nullable',
            ],
            'driver.image_url' => [
                'string',
                'nullable',
            ],
            'driver.blood_group' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['blood_group'])),
            ],
            'mediaCollections.driver_profile_picture' => [
                'array',
                'nullable',
            ],
            'mediaCollections.driver_profile_picture.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'driver.dob' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'driver.license_expiry_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'driver.gender' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['gender'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['blood_group'] = $this->driver::BLOOD_GROUP_SELECT;
        $this->listsForFields['gender']      = $this->driver::GENDER_RADIO;
    }
}

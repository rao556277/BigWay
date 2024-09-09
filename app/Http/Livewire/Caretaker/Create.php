<?php

namespace App\Http\Livewire\Caretaker;

use App\Models\Caretaker;
use App\Models\Emergencycontact;
use App\Models\Vehicletype;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Caretaker $caretaker;

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
                ->update(['model_id' => $this->caretaker->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Caretaker $caretaker)
    {
        $this->caretaker = $caretaker;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.caretaker.create');
    }

    public function submit()
    {
        $this->validate();

        $this->caretaker->save();
        $this->syncMedia();

        return redirect()->route('admin.caretakers.index');
    }

    protected function rules(): array
    {
        return [
            'caretaker.name' => [
                'string',
                'nullable',
            ],
            'caretaker.address' => [
                'string',
                'nullable',
            ],
            'caretaker.cnic' => [
                'string',
                'nullable',
            ],
            'caretaker.image_url' => [
                'string',
                'nullable',
            ],
            'caretaker.medical_condition' => [
                'string',
                'nullable',
            ],
            'caretaker.emergency_medication' => [
                'string',
                'nullable',
            ],
            'caretaker.allergies' => [
                'string',
                'nullable',
            ],
            'caretaker.employment_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'caretaker.date_of_birth' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'caretaker.blood_group' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['blood_group'])),
            ],
            'caretaker.vehicle_type_id' => [
                'integer',
                'exists:vehicletypes,id',
                'nullable',
            ],
            'caretaker.emergency_contact_id' => [
                'integer',
                'exists:emergencycontacts,id',
                'nullable',
            ],
            'mediaCollections.caretaker_profile_picture' => [
                'array',
                'nullable',
            ],
            'mediaCollections.caretaker_profile_picture.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'caretaker.gender' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['gender'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['blood_group']       = $this->caretaker::BLOOD_GROUP_SELECT;
        $this->listsForFields['vehicle_type']      = Vehicletype::pluck('name', 'id')->toArray();
        $this->listsForFields['emergency_contact'] = Emergencycontact::pluck('name', 'id')->toArray();
        $this->listsForFields['gender']            = $this->caretaker::GENDER_RADIO;
    }
}

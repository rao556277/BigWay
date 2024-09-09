<?php

namespace App\Http\Livewire\Guardian;

use App\Models\Guardian;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Guardian $guardian;

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

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
                ->update(['model_id' => $this->guardian->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Guardian $guardian)
    {
        $this->guardian = $guardian;
        $this->initListsForFields();
        $this->mediaCollections = [

            'guardian_profile_picture' => $guardian->profile_picture,

        ];
    }

    public function render()
    {
        return view('livewire.guardian.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->guardian->save();
        $this->syncMedia();

        return redirect()->route('admin.guardians.index');
    }

    protected function rules(): array
    {
        return [
            'guardian.name' => [
                'string',
                'required',
            ],
            'guardian.address' => [
                'string',
                'nullable',
            ],
            'guardian.payment_details' => [
                'string',
                'nullable',
            ],
            'guardian.verified' => [
                'string',
                'nullable',
            ],
            'mediaCollections.guardian_profile_picture' => [
                'array',
                'nullable',
            ],
            'mediaCollections.guardian_profile_picture.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'guardian.gender' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['gender'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['gender'] = $this->guardian::GENDER_RADIO;
    }
}

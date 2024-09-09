<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Admin $admin;

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
                ->update(['model_id' => $this->admin->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Admin $admin)
    {
        $this->admin = $admin;
        $this->initListsForFields();
        $this->mediaCollections = [

            'admin_profile_picture' => $admin->profile_picture,
        ];
    }

    public function render()
    {
        return view('livewire.admin.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->admin->save();
        $this->syncMedia();

        return redirect()->route('admin.admins.index');
    }

    protected function rules(): array
    {
        return [
            'admin.name' => [
                'string',
                'nullable',
            ],
            'admin.permissions' => [
                'string',
                'nullable',
            ],
            'admin.role' => [
                'string',
                'nullable',
            ],
            'admin.blood_group' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['blood_group'])),
            ],
            'mediaCollections.admin_profile_picture' => [
                'array',
                'nullable',
            ],
            'mediaCollections.admin_profile_picture.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['blood_group'] = $this->admin::BLOOD_GROUP_SELECT;
    }
}

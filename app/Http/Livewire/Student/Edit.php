<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use App\Models\User;
use App\Models\Vehicle;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Student $student;

    public array $vehicle = [];

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
                ->update(['model_id' => $this->student->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Student $student)
    {
        $this->student = $student;
        $this->vehicle = $this->student->vehicle()->pluck('id')->toArray();
        $this->initListsForFields();
        $this->mediaCollections = [

            'student_profile_picture' => $student->profile_picture,

        ];
    }

    public function render()
    {
        return view('livewire.student.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->student->save();
        $this->student->vehicle()->sync($this->vehicle);
        $this->syncMedia();

        return redirect()->route('admin.students.index');
    }

    protected function rules(): array
    {
        return [
            'student.name' => [
                'string',
                'required',
            ],
            'student.dob' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'student.location' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'student.grade' => [
                'string',
                'nullable',
            ],
            'student.attendance_status' => [
                'string',
                'nullable',
            ],
            'student.qr_code' => [
                'string',
                'nullable',
            ],
            'student.medical_condition' => [
                'string',
                'nullable',
            ],
            'student.emergency_medication' => [
                'string',
                'nullable',
            ],
            'student.allergies' => [
                'string',
                'nullable',
            ],
            'student.blood_group' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['blood_group'])),
            ],
            'vehicle' => [
                'array',
            ],
            'vehicle.*.id' => [
                'integer',
                'exists:vehicles,id',
            ],
            'mediaCollections.student_profile_picture' => [
                'array',
                'nullable',
            ],
            'mediaCollections.student_profile_picture.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'student.gender' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['gender'])),
            ],
            'student.school_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['blood_group'] = $this->student::BLOOD_GROUP_SELECT;
        $this->listsForFields['vehicle']     = Vehicle::pluck('vehicle_number', 'id')->toArray();
        $this->listsForFields['gender']      = $this->student::GENDER_RADIO;
        $this->listsForFields['school']      = User::pluck('name', 'id')->toArray();
    }
}

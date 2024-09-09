<?php

namespace App\Http\Livewire\School;

use App\Models\Location;
use App\Models\School;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public School $school;

    public array $listsForFields = [];

    public function mount(School $school)
    {
        $this->school = $school;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.school.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->school->save();

        return redirect()->route('admin.schools.index');
    }

    protected function rules(): array
    {
        return [
            'school.name' => [
                'string',
                'required',
            ],
            'school.address' => [
                'string',
                'required',
            ],
            'school.contact_number' => [
                'string',
                'required',
            ],
            'school.location_id' => [
                'integer',
                'exists:locations,id',
                'nullable',
            ],
            'school.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['location'] = Location::pluck('latitude', 'id')->toArray();
        $this->listsForFields['user']     = User::pluck('name', 'id')->toArray();
    }
}

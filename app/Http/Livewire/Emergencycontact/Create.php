<?php

namespace App\Http\Livewire\Emergencycontact;

use App\Models\Emergencycontact;
use App\Models\Student;
use Livewire\Component;

class Create extends Component
{
    public array $listsForFields = [];

    public Emergencycontact $emergencycontact;

    public function mount(Emergencycontact $emergencycontact)
    {
        $this->emergencycontact = $emergencycontact;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.emergencycontact.create');
    }

    public function submit()
    {
        $this->validate();

        $this->emergencycontact->save();

        return redirect()->route('admin.emergencycontacts.index');
    }

    protected function rules(): array
    {
        return [
            'emergencycontact.name' => [
                'string',
                'required',
            ],
            'emergencycontact.relationship' => [
                'string',
                'required',
            ],
            'emergencycontact.contact_1' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'emergencycontact.contact_2' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'emergencycontact.student_id' => [
                'integer',
                'exists:students,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['student'] = Student::pluck('name', 'id')->toArray();
    }
}

<?php

namespace App\Http\Livewire\Attendance;

use App\Models\Attendance;
use App\Models\Student;
use Livewire\Component;

class Edit extends Component
{
    public Attendance $attendance;

    public array $listsForFields = [];

    public function mount(Attendance $attendance)
    {
        $this->attendance = $attendance;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.attendance.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->attendance->save();

        return redirect()->route('admin.attendances.index');
    }

    protected function rules(): array
    {
        return [
            'attendance.route' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'attendance.date' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'attendance.pickup_time' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'attendance.dropoff_time' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'attendance.student_id' => [
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

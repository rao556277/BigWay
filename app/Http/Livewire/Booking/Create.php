<?php

namespace App\Http\Livewire\Booking;

use App\Models\Booking;
use App\Models\Student;
use App\Models\User;
use App\Models\Vehicle;
use Livewire\Component;

class Create extends Component
{
    public Booking $booking;

    public array $user = [];

    public array $student = [];

    public array $vehicle = [];

    public array $listsForFields = [];

    public function mount(Booking $booking)
    {
        $this->booking = $booking;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.booking.create');
    }

    public function submit()
    {
        $this->validate();

        $this->booking->save();
        $this->booking->user()->sync($this->user);
        $this->booking->student()->sync($this->student);
        $this->booking->vehicle()->sync($this->vehicle);

        return redirect()->route('admin.bookings.index');
    }

    protected function rules(): array
    {
        return [
            'booking.booking_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'booking.start_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'booking.end_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'booking.status' => [
                'string',
                'nullable',
            ],
            'booking.cost' => [
                'numeric',
                'nullable',
            ],
            'booking.amount' => [
                'numeric',
                'nullable',
            ],
            'booking.payment_status' => [
                'string',
                'nullable',
            ],
            'booking.booking_status' => [
                'string',
                'nullable',
            ],
            'booking.description' => [
                'string',
                'nullable',
            ],
            'user' => [
                'array',
            ],
            'user.*.id' => [
                'integer',
                'exists:users,id',
            ],
            'student' => [
                'array',
            ],
            'student.*.id' => [
                'integer',
                'exists:students,id',
            ],
            'vehicle' => [
                'array',
            ],
            'vehicle.*.id' => [
                'integer',
                'exists:vehicles,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user']    = User::pluck('name', 'id')->toArray();
        $this->listsForFields['student'] = Student::pluck('name', 'id')->toArray();
        $this->listsForFields['vehicle'] = Vehicle::pluck('vehicle_number', 'id')->toArray();
    }
}

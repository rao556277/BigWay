<?php

namespace App\Http\Livewire\Payment;

use App\Models\Guardian;
use App\Models\Payment;
use App\Models\Route;
use App\Models\Student;
use Livewire\Component;

class Create extends Component
{
    public Payment $payment;

    public array $route = [];

    public array $listsForFields = [];

    public function mount(Payment $payment)
    {
        $this->payment = $payment;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.payment.create');
    }

    public function submit()
    {
        $this->validate();

        $this->payment->save();
        $this->payment->route()->sync($this->route);

        return redirect()->route('admin.payments.index');
    }

    protected function rules(): array
    {
        return [
            'payment.transaction' => [
                'string',
                'required',
                'unique:payments,transaction',
            ],
            'payment.amount' => [
                'numeric',
                'nullable',
            ],
            'payment.payment_method' => [
                'string',
                'nullable',
            ],
            'payment.reference_number' => [
                'string',
                'nullable',
            ],
            'payment.date' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'payment.guardian_id' => [
                'integer',
                'exists:guardians,id',
                'nullable',
            ],
            'payment.student_id' => [
                'integer',
                'exists:students,id',
                'nullable',
            ],
            'route' => [
                'array',
            ],
            'route.*.id' => [
                'integer',
                'exists:routes,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['guardian'] = Guardian::pluck('name', 'id')->toArray();
        $this->listsForFields['student']  = Student::pluck('name', 'id')->toArray();
        $this->listsForFields['route']    = Route::pluck('route_name', 'id')->toArray();
    }
}

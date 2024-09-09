<?php

namespace App\Http\Livewire\Earning;

use App\Models\Earning;
use Livewire\Component;

class Create extends Component
{
    public Earning $earning;

    public function mount(Earning $earning)
    {
        $this->earning = $earning;
    }

    public function render()
    {
        return view('livewire.earning.create');
    }

    public function submit()
    {
        $this->validate();

        $this->earning->save();

        return redirect()->route('admin.earnings.index');
    }

    protected function rules(): array
    {
        return [
            'earning.amount' => [
                'numeric',
                'required',
            ],
            'earning.date' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'earning.payment_method' => [
                'string',
                'required',
            ],
            'earning.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}

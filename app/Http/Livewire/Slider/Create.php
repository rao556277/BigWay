<?php

namespace App\Http\Livewire\Slider;

use App\Models\Slider;
use Livewire\Component;

class Create extends Component
{
    public Slider $slider;

    public function mount(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function render()
    {
        return view('livewire.slider.create');
    }

    public function submit()
    {
        $this->validate();

        $this->slider->save();

        return redirect()->route('admin.sliders.index');
    }

    protected function rules(): array
    {
        return [
            'slider.image_url' => [
                'string',
                'required',
            ],
            'slider.title' => [
                'string',
                'required',
            ],
            'slider.description' => [
                'string',
                'nullable',
            ],
            'slider.caption' => [
                'string',
                'nullable',
            ],
            'slider.link_url' => [
                'string',
                'required',
            ],
            'slider.display_order' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}

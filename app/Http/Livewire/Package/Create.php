<?php

namespace App\Http\Livewire\Package;

use App\Models\Package;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public Package $package;

    public array $listsForFields = [];

    public function mount(Package $package)
    {
        $this->package = $package;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.package.create');
    }

    public function submit()
    {
        $this->validate();

        $this->package->save();

        return redirect()->route('admin.packages.index');
    }

    protected function rules(): array
    {
        return [
            'package.package_name' => [
                'string',
                'required',
            ],
            'package.price' => [
                'numeric',
                'nullable',
            ],
            'package.duration' => [
                'string',
                'nullable',
            ],
            'package.package_type' => [
                'string',
                'nullable',
            ],
            'package.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'package.description' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user'] = User::pluck('name', 'id')->toArray();
    }
}

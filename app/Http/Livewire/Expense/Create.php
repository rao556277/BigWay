<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public Expense $expense;

    public array $listsForFields = [];

    public function mount(Expense $expense)
    {
        $this->expense = $expense;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.expense.create');
    }

    public function submit()
    {
        $this->validate();

        $this->expense->save();

        return redirect()->route('admin.expenses.index');
    }

    protected function rules(): array
    {
        return [
            'expense.date' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'expense.amount' => [
                'numeric',
                'nullable',
            ],
            'expense.description' => [
                'string',
                'nullable',
            ],
            'expense.expense_type' => [
                'string',
                'nullable',
            ],
            'expense.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user'] = User::pluck('name', 'id')->toArray();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Expense;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExpenseController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('expense_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.expense.index');
    }

    public function create()
    {
        abort_if(Gate::denies('expense_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.expense.create');
    }

    public function edit(Expense $expense)
    {
        abort_if(Gate::denies('expense_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.expense.edit', compact('expense'));
    }

    public function show(Expense $expense)
    {
        abort_if(Gate::denies('expense_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expense->load('user', 'createdBy', 'updatedBy');

        return view('admin.expense.show', compact('expense'));
    }

    public function __construct()
    {
        $this->csvImportModel = Expense::class;
    }
}

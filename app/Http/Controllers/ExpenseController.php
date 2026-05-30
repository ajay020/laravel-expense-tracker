<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $search = request("search");
     

        $expenses = auth()->user()
            ->expenses()
            ->orderBy('created_at','desc')
            ->with('category')
            ->when($search, function ($query, $search) {
                $query->where('title','like','%'. $search .'%');
            })
            ->when(
                request('category'),
                fn ($query, $categoryId) =>
                    $query->where('category_id', $categoryId))
            ->when(
                request('month'),
                fn ($query, $month) =>
                    $query->whereMonth('expense_date', $month)
            )
            ->when(
                request('start_date'),
                fn ($query, $date) =>
                $query->whereDate('expense_date', '>=', $date)
            )
            ->when(
                request('end_date'),
                fn ($query, $date) =>
                    $query->whereDate('expense_date', '<=', $date)
            )
            ->latest()
            ->paginate(4)
            ->withQueryString();

        $categories = auth()->user()
            ->categories()
            ->orderBy('name')
            ->get();

        return view('expenses.index', [
            'expenses' => $expenses,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = auth()->user()
            ->categories()
            ->get();

        return view('expenses.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(StoreExpenseRequest $request)
    {
        auth()->user()
            ->expenses()
            ->create($request->validated());

        return redirect('/expenses')
            ->with('success', 'Expense created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        return view('expenses.show', [
            'expense' => $expense,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $this->authorize('update', $expense);

        $categories = auth()->user()->categories()->get();

        return view('expenses.edit', [
            'categories' => $categories,
            'expense' => $expense,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        $expense->update($request->validated());

        return redirect('/expenses')->with('success', 'Expense updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $this->authorize('delete', $expense);

        $expense->delete();

        return redirect('/expenses')->with('success', 'Expense deleted successfully!');
    }
}

<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $totalExpenses = $user->expenses()
            ->sum('amount');

        $monthlyExpenses = $user->expenses()
            ->whereMonth('expense_date', now()->month)
            ->whereYear('expense_date', now()->year)
            ->sum('amount');

        $todayExpenses = $user->expenses()
            ->whereDate('expense_date', today())
            ->sum('amount');

        $totalCategories = $user->categories()
            ->count();

        $recentExpenses = $user->expenses()
            ->with('category')
            ->latest()
            ->take(5)
            ->get();

        $topCategories = auth()->user()
            ->categories()
            ->select('categories.id', 'categories.name')
            ->selectRaw('SUM(expenses.amount) as total_spent')
            ->join('expenses', 'categories.id', '=', 'expenses.category_id')
            ->groupBy('categories.id', 'categories.name')
            ->orderByDesc('total_spent')
            ->take(5)
            ->get();

        return view('dashboard', [
            'totalExpenses' => $totalExpenses,
            'monthlyExpenses' => $monthlyExpenses,
            'todayExpenses' => $todayExpenses,
            'totalCategories' => $totalCategories,
            'recentExpenses' => $recentExpenses,
            'topCategories' => $topCategories,
        ]);
    }
}

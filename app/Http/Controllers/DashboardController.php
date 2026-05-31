<?php

namespace App\Http\Controllers;
  

class DashboardController extends Controller
{
    private $monthNames = [
            '01' => 'Jan',
            '02' => 'Feb',
            '03' => 'Mar',
            '04' => 'Apr',
            '05' => 'May',
            '06' => 'Jun',
            '07' => 'Jul',
            '08' => 'Aug',
            '09' => 'Sep',
            '10' => 'Oct',
            '11' => 'Nov',
            '12' => 'Dec',
    ];
    
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


        $monthlySpending = auth()->user()
            ->expenses()
            ->selectRaw('strftime("%m", expense_date) as month')
            ->selectRaw('SUM(amount) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = $monthlySpending
            ->pluck('month')
            ->map(fn ($month) => $this->monthNames[$month]);

        $values = $monthlySpending
            ->pluck('total');

        // dump($labels, $values);

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
            'labels' => $labels,
            'values' => $values,
        ]);
    }
}

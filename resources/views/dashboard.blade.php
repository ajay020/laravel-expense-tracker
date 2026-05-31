<x-layouts.app>

    <h1 class="text-3xl font-bold mb-8">
        Dashboard
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">

        <x-stat-card
            title="Total Expenses"
            :value="$totalExpenses"
        />

        <x-stat-card
            title="This Month"
            :value="$monthlyExpenses"
        />

        <x-stat-card
            title="Today"
            :value="$todayExpenses"
        />

         <x-stat-card
            title="Categories"
            :value="$totalCategories"
        />

    </div>

     {{-- Monthly Spending Chart --}}
    <x-monthly-chart :labels="$labels" :values="$values" />

    <div class="bg-white shadow rounded p-4 bb-8">
        <h2 class="text-xl font-semibold mb-4">
            Top Spending Categories
        </h2>

        @foreach($topCategories as $category)

                <div class="flex justify-between border-b py-2">

                    <span>{{ $category->name }}</span>

                    <span>
                        ₹{{ number_format($category->total_spent, 2) }}
                    </span>

                </div>

        @endforeach
    </div>

   
    <div class="bg-white shadow rounded p-4 mt-8">
        <h2 class="text-xl font-semibold mb-4">
            Recent Expenses
        </h2>

        <div class="space-y-3">

            @forelse($recentExpenses as $expense)

                <div class="border-b p-4 flex justify-between">

                    <div>
                        <p class="font-medium">
                            {{ $expense->title }}
                        </p>

                        <p class="text-sm text-gray-500">
                            {{ $expense->category->name }}
                        </p>
                    </div>

                    <div class="text-right">
                        <p class="font-semibold">
                            ₹{{ number_format($expense->amount, 2) }}
                        </p>

                        <p class="text-sm text-gray-500">
                            {{ $expense->expense_date }}
                        </p>
                    </div>

                </div>

            @empty
                <p>No spending data available.</p>
            @endforelse

        </div>
    </div>

</x-layouts.app>
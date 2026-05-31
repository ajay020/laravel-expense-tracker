<x-layouts.app>

    <h1 class="text-3xl font-bold mb-8">
        Dashboard
    </h1>

    <div class="bg-white p-4 rounded shadow mb-8">
        <h2 class="text-xl font-semibold mb-4">
            Monthly Spending
        </h2>

        <canvas id="monthlyChart"></canvas>

        <script>
            const ctx = document.getElementById('monthlyChart');

            new Chart(ctx, {
                type: 'bar',

                data: {
                    labels: @json($labels),

                    datasets: [{
                        label: 'Expenses',

                        data: @json($values),
                    }]
                }
            });
        </script>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">

        <div class="border rounded p-4">
            <h2 class="text-gray-500">Total Expenses</h2>
            <p class="text-2xl font-bold">
                ₹{{ number_format($totalExpenses, 2) }}
            </p>
        </div>

        <div class="border rounded p-4">
            <h2 class="text-gray-500">This Month</h2>
            <p class="text-2xl font-bold">
                ₹{{ number_format($monthlyExpenses, 2) }}
            </p>
        </div>

        <div class="border rounded p-4">
            <h2 class="text-gray-500">Today</h2>
            <p class="text-2xl font-bold">
                ₹{{ number_format($todayExpenses, 2) }}
            </p>
        </div>

        <div class="border rounded p-4">
            <h2 class="text-gray-500">Categories</h2>
            <p class="text-2xl font-bold">
                {{ $totalCategories }}
            </p>
        </div>

    </div>

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

    <h2 class="text-xl font-semibold mb-4 mt-8">
        Recent Expenses
    </h2>

    <div class="space-y-3">

        @forelse($recentExpenses as $expense)

            <div class="border rounded p-4 flex justify-between">

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

            <p>No expenses yet.</p>

        @endforelse

    </div>

</x-layouts.app>
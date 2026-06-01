<x-layouts.app title="Expenses">

    <div
        x-data="{
            open: {{ request()->hasAny([
                'search',
                'category',
                'month',
                'start_date',
                'end_date'
            ]) ? 'true' : 'false' }}
        }"
        class="mb-4"
    >
        <button
            @click="open = !open"
            class=" inline-flex items-center gap-2 rounded px-1 py-1 cursor-pointer"
        >
            <span x-text="open ? 'Hide Filters' : 'Show Filters'"></span>

            <svg
                :class="{ 'rotate-180': open }"
                class="size-5 transition-transform"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m19.5 8.25-7.5 7.5-7.5-7.5"
                />
            </svg>

        </button>

        <div
            x-show="open"
            x-transition
        >
            <div class="bg-white border rounded-lg p-4 shadow-sm mb-6">

                <h2 class="font-semibold mb-4">
                    Filters
                </h2>

                <form method="GET" action="{{ route('expenses.index') }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <input
                            type="text"
                            name="search"
                            placeholder="Search by title..."
                            value="{{ request('search') }}"
                            class="border rounded px-3 py-2"
                        >

                        <select
                            name="category"
                            class="border rounded px-3 py-2"
                        >
                            <option value="">
                                All Categories
                            </option>

                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    @selected(request('category') == $category->id)
                                >
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                        <select
                            name="month"
                            class="border rounded px-3 py-2"
                        >
                            <option value="">
                                All Months
                            </option>

                            <option value="1">January</option>
                            <option value="2">February</option>
                            ...
                        </select>

                        <input
                            type="date"
                            name="start_date"
                            value="{{ request('start_date') }}"
                            class="border rounded px-3 py-2"
                        >

                        <input
                            type="date"
                            name="end_date"
                            value="{{ request('end_date') }}"
                            class="border rounded px-3 py-2"
                        >

                    </div>

                    <div class="flex gap-3 mt-4">

                        <button
                            type="submit"
                            class="bg-black text-white px-4 py-2 rounded"
                        >
                            Apply Filters
                        </button>

                        <a

                            href="{{ route('expenses.index') }}"
                            class="border px-4 py-2 rounded"
                        >
                            Clear
                        </a>

                    </div>

                </form>

            </div>
        </div>
    </div>



    <div class="flex justify-between items-center my-5">

        <h1 class="text-2xl font-bold">
            Expenses
        </h1>

        <p class="text-sm text-gray-500">
            {{ $expenses->total() }} expenses found
        </p>

    </div>

    {{-- Expense list --}}

    @if ($expenses->isEmpty())
        <p>No expenses</p>

    @else
        <div class=" mb-4">

            @foreach($expenses as $expense)
               <div class="bg-white border rounded-lg p-4 shadow-sm mb-4">

                    <div class="flex items-start justify-between">

                        <div>
                            <h2 class="text-lg font-semibold">
                                {{ $expense->title }}
                            </h2>

                            <div class="flex items-center gap-3 mt-1">

                                <span class="text-sm px-2 py-1 bg-gray-100 rounded-full">
                                    {{ $expense->category->name }}
                                </span>

                                <span class="text-sm text-gray-500">
                                    {{ \Carbon\Carbon::parse($expense->expense_date)->format('d M Y') }}
                                </span>

                            </div>

                            @if($expense->note)
                                <p class="text-sm text-gray-600 mt-2">
                                    {{ $expense->note }}
                                </p>
                            @endif
                        </div>

                        <div class="text-right">

                            <p class="text-xl font-bold">
                                ₹{{ number_format($expense->amount, 2) }}
                            </p>

                            <x-action-buttons
                                :edit-route="route('expenses.edit', $expense)"
                                :delete-route="route('expenses.destroy', $expense)"
                            />

                        </div>

                    </div>

                </div>
            @endforeach

            <div class="p-4">
                {{ $expenses->withQueryString()->links() }}
            </div>

        </div>
    @endif
</x-layouts.app>
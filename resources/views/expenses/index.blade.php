<x-layouts.app title="Expenses">

    <form method="GET" action="{{ route('expenses.index') }}" class="mb-4">

        {{-- filter by category --}}
        <select name="category">

            <option value="">
                All Categories
            </option>

            @foreach($categories as $category)

                <option value="{{ $category->id }}" @selected(request('category') == $category->id)>
                    {{ $category->name }}
                </option>

            @endforeach

        </select>

        {{-- filter by month --}}

        <select name="month">
            <option value="">All Months</option>
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>

        </select>

        <button type="submit" class=" px-2 bg-blue-500 text-white rounded">
            Filter
        </button>

    </form>

    {{-- search by title --}}
    <form action="{{ route('expenses.index') }}" method="GET" class="mb-4 flex items-center gap-2">
        <input
            type="text"
            name="search"
            placeholder="Search expenses by title..." 
            value="{{ request('search') }}"
            class="px-2 py-1 border rounded flex-1"
        >
        <button type="submit" class="px-2 py-1 cursor-pointer bg-green-500 text-white rounded">Search</button>
    </form>

    {{-- filter by date range --}}
    <div class="mb-4">
        <form action="{{ route('expenses.index') }}" method="GET" class="flex items-center gap-2">
            <label for="from" class="mr-2">From:</label>
            <input 
                type="date"
                name="start_date"
                id="from" 
                value="{{ request('start_date') }}" 
                class="px-2 py-1 border rounded"
              >
            <label for="to" class="mr-2">To:</label>
            <input
                 type="date"
                 name="end_date" 
                 id="to"
                 value="{{ request('end_date') }}"
                 class="px-2 py-1 border rounded"
            >
            <button 
                type="submit"
                 class="px-2 py-1 cursor-pointer bg-purple-500 text-white rounded"
             >
             Filter
            </button>
        </form>
    </div>

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
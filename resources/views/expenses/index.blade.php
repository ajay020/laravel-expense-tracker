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
        <div class="bg-gray-300 p-4 mb-4">

            @foreach($expenses as $expense)
                <div class="bg-gray-100 p-4 mb-4">

                    <h2>{{ $expense->title }}</h2>

                    <p>₹{{ $expense->amount }}</p>

                    <p>{{ $expense->category->name }}</p>

                    <p>{{ $expense->expense_date }}</p>

                    <a href="{{ route('expenses.edit', $expense) }}" class="px-2">Edit</a>
                    <form action="{{ route('expenses.destroy', $expense) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>

                </div>
            @endforeach

            <div class="p-4">
                {{-- {{ $expenses->links() }} --}}
                {{ $expenses->withQueryString()->links() }}
            </div>

        </div>

    @endif
</x-layouts.app>
<x-layouts.app>

    @if ($expenses->isEmpty())
        <p>No expenses</p>

    @else
        @foreach($expenses as $expense)
            <div class="border p-4 mb-4">

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
    @endif

</x-layouts.app>
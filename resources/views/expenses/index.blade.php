<x-layouts.app>

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

            <div class="p-4 bg-gray-100">
                {{ $expenses->links() }}
            </div>

        </div>

    @endif

</x-layouts.app>
<x-layouts.app title="Add expense">

    <h1 class="text-2xl mb-6">
        Edit Expense
    </h1>

    <form method="POST" action="{{  route('expenses.update', $expense) }}">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <input type="text" name="title" placeholder="Expense title" value="{{ old('title', $expense->title) }}"
                class="border p-2 w-full">

            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <input type="number" step="0.01" name="amount" placeholder="Amount"
                value="{{ old('amount', $expense->amount) }}" class="border p-2 w-full">

            @error('amount')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <select name="category_id" class="border p-2 w-full" value="{{ old('category_id', $expense->category_id) }}">
                @foreach($categories as $category)

                    <option value="{{ $category->id }}" {{ old('category_id', $expense->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>

                @endforeach
            </select>

            @error('category_id')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <input type="date" name="expense_date" value="{{ old('expense_date', $expense->expense_date) }}"
                class="border p-2 w-full">
        </div>

        <div class="mb-4">
            <textarea name="note" placeholder="Optional note"
                class="border p-2 w-full">{{ old('note', $expense->note) }}</textarea>
        </div>

        <button class="bg-black text-white px-4 py-2 rounded">
            Save Expense
        </button>

    </form>

</x-layouts.app>
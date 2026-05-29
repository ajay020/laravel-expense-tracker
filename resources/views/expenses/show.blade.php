<x-layouts.app>

    <div class="border p-4 mb-4">

        <h2>{{ $expense->title }}</h2>

        <p>₹{{ $expense->amount }}</p>

        <p>{{ $expense->category->name }}</p>

        <p>{{ $expense->expense_date }}</p>

        <p>{{ $expense->note }}</p>

    </div>

</x-layouts.app>

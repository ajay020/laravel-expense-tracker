<x-layouts.app title="Add expense">

 <div class="max-w-2xl mx-auto">

    <div class="bg-white rounded-lg border shadow-sm p-6">

        <h1 class="text-2xl mb-6">
            Edit Expense
        </h1>

        <form method="POST" action="{{  route('expenses.update', $expense) }}">
            @csrf
            @method('PATCH')

             <x-forms.field label="Title">
                <x-forms.input
                    name="title"
                    placeholder="Expense title"
                    :value="$expense->title"
                />
            </x-forms.field>


            <x-forms.field label="Amount">
                <x-forms.input
                    name="amount"
                    type="number"
                    placeholder="Expense amount"
                    :value="$expense->amount"
                />
            </x-forms.field>

            <x-forms.field label="Category">
                <x-forms.select
                    :categories="$categories"      
                    :value="$expense->category_id"               
                />
            </x-forms.field>

            <x-forms.field label="Date">
                <x-forms.input
                    name="expense_date"
                    type="date"
                    :value="$expense->expense_date"
                />
            </x-forms.field>

            <x-forms.field label="Note">
                <x-forms.textarea
                    name="note"
                    :value="$expense->note"
                />
            </x-forms.field>

            <x-forms.button>
                Save Expense
            </x-forms.button>

        </form>
    </div>
</div>

</x-layouts.app>
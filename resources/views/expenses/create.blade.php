<x-layouts.app title="Add expense">

<div class="max-w-2xl mx-auto">

    <div class="bg-white rounded-lg border shadow-sm p-6">
       <h1 class="text-2xl font-semibold mb-6">
            Add Expense
        </h1>

        <form method="POST" action="/expenses">
            @csrf

           <x-forms.field label="Title">
                <x-forms.input
                    name="title"
                    placeholder="Expense title"
                />
            </x-forms.field>

           <x-forms.field label="Amount">
                <x-forms.input
                    name="amount"
                    type="number"
                    step="0.01"
                />
            </x-forms.field>

           <x-forms.field label="Category">
                <x-forms.select
                    :categories="$categories"                     
                />
            </x-forms.field>

            <x-forms.field label="Date">
                <x-forms.input
                    name="expense_date"
                    type="date"
                />
            </x-forms.field>

            <x-forms.field label="Note">
                <x-forms.textarea
                    name="note"
                />
            </x-forms.field>

            <x-forms.button>
                Save Expense
            </x-forms.button>

        </form>
    </div>
</div>

</x-layouts.app>
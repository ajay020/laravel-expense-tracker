<x-layouts.app>

<div class="max-w-2xl mx-auto">

    <div class="bg-white rounded-lg border shadow-sm p-6">

        <h1 class="text-2xl font-bold mb-4">Edit Category</h1>

        <form action="{{ route('categories.update', $category) }}" method="POST" class="space-y-4">
            @csrf
            @method('PATCH')

            <x-forms.field label="Category Name">
                <x-forms.input
                    name="name" 
                    id="name" 
                    value="{{ old('name', $category->name) }}"
                    required
                    placeholder="Enter category name"
                />
            </x-forms.field>

            <x-forms.button type="submit">
                Update Category
            </x-forms.button>

        </form>

    </div>
</div>

</x-layouts.app>
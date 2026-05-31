<x-layouts.app>
    <h1 class="text-2xl font-bold mb-4">Categories</h1>

    <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add
        Category</a>

    @if($categories->isEmpty())
        <p>No categories found.</p>
    @else
        <ul class="space-y-2">
            @foreach($categories as $category)
                <li class="flex justify-between items-center bg-gray-100 p-4 rounded">
                    <span>{{ $category->name }}</span>
                    <div>
                        <x-action-buttons
                            :edit-route="route('categories.edit', $category)"
                            :delete-route="route('categories.destroy', $category)"
                        />
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</x-layouts.app>
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
                        <a href="{{ route('categories.edit', $category) }}" class="text-blue-500 mr-2">Edit</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</x-layouts.app>
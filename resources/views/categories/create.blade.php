<x-layouts.app>
    <h1 class="text-2xl font-bold mb-4">Create Category</h1>

    <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
        @csrf
        
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
            <input type="text" name="name" id="name" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Category</button>
    </form>

</x-layouts.app>
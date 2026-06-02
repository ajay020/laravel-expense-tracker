<x-layouts.app>

    <div class="flex items-center gap-4 mb-4">
        <h1 class=" text-2xl font-bold">
            Categories
        </h1>
          <a 
            href="{{ route('categories.create') }}"
            class=" text-black px-1 py-2 rounded"
            title="Add Category"
            >
            <x-round-plus-icon size="6" class="text-black" />
        </a>
    </div>

    @if($categories->isEmpty())
        <p>No categories found.</p>
    @else
        <ul class="space-y-2">
            @foreach($categories as $category)
                <li class="bg-white rounded shadow flex justify-between items-center p-4">
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
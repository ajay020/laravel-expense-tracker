<x-layouts.app>

    <div class="flex gap-2">
        <h1 class=" text-2xl font-bold mb-4">
            Categories
        </h1>
          <a title="Add category" href="{{ route('categories.create') }}" class="inline-flex gap-2  items-center px-1 py-2 rounded mb-4">
             <x-round-plus-icon size="7" />
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
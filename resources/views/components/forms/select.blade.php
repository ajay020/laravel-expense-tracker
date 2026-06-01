@props([
    'categories',
    'value' => ''
])

<div>
    <select 
        name="category_id" 
        value="{{ old('category_id', $value) }}"
        class="border p-2 w-full rounded-lg"
    >
        @foreach($categories as $category)

            <option
             value="{{ $category->id }}"
             {{ old('category_id', $value) == $category->id ? 'selected' : '' }}
            >
                {{ $category->name }}
            </option>

        @endforeach
    </select>

    @error('category_id')
        <p>{{ $message }}</p>
    @enderror
</div>
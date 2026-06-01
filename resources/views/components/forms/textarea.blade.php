@props([
    'name',
    'value' => ''
])

<div>

    <textarea
        name="{{ $name }}"
        {{ $attributes->merge([
            'class' => 'w-full border rounded-lg px-3 py-2'
        ]) }}
    >{{ old($name, $value) }}</textarea>

    @error($name)
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror

</div>
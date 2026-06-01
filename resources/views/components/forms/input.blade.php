@props([
    'name',
    'type' => 'text',
    'value' => ''
])

<div>
    <input
        {{ $attributes->merge([
            'class' => 'w-full border rounded-lg px-3 py-2'
        ]) }}
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
    >

    @error($name)
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
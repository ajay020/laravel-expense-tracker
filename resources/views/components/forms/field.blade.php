@props(['label'])

<div class="mb-5">
    <label class="block text-sm font-medium mb-2">
        {{ $label }}
    </label>

    {{ $slot }}
</div>
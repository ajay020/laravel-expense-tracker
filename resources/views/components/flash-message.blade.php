@props([
    'type' => 'success'
])

@php

$classes = match($type) {
    'success' => 'border-green-200 bg-green-100 text-green-800',
    'error' => 'border-red-200 bg-red-100 text-red-800',
    'warning' => 'border-yellow-200 bg-yellow-100 text-yellow-800',
};

@endphp

@if($slot->isNotEmpty())

    <div
        x-data="{ show: true }"
        x-show="show"
        x-init="setTimeout(() => show = false, 3000)"
        class="mb-4 rounded-lg border px-4 py-3 {{ $classes }}"
    >
        {{ $slot }}
    </div>

@endif


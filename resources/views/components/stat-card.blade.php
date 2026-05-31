@props([
    'title', 
    'value'
])

<div class="shadow bg-white rounded p-4">
    <h2 class="text-gray-500">{{ $title }}</h2>
    <p class="text-2xl font-bold">
        ₹{{ number_format($value, 2) }}
    </p>
</div>
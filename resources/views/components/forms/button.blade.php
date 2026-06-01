<button
    {{ $attributes->merge([
        'class' => 'bg-black text-white px-4 py-2 rounded-lg cursor-pointer'
    ]) }}
>
    {{ $slot }}
</button>
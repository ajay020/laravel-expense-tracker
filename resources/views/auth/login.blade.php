<x-layouts.app>

    <h1 class="text-2xl font-bold mb-6">
        Login
    </h1>

    <form method="POST" action="/login">
        @csrf

        <div class="mb-4">
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="border p-2 w-full">

            @error('email')
                <p class="text-red-500 text-sm">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="mb-4">
            <input type="password" name="password" placeholder="Password" class="border p-2 w-full">
        </div>

        <button class="bg-black text-white px-4 py-2 rounded cursor-pointer">
            Login
        </button>
    </form>

</x-layouts.app>
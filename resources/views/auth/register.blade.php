<x-layouts.app>

    <h1 class="text-2xl font-bold mb-6">
        Register
    </h1>

    <form method="POST" action="/register">
        @csrf

        <div class="mb-4">

            <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" class="border p-2 w-full">

            @error('name')
                <p>{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-4">

            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="border p-2 w-full">

            @error('email')
                <p>{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-4">

            <input type="password" name="password" placeholder="Password" class="border p-2 w-full">

            @error('password')
                <p>{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-4">

            <input type="password" name="password_confirmation" placeholder="Confirm Password"
                class="border p-2 w-full">

            @error('password_confirmation')
                <p>{{ $message }}</p>
            @enderror

        </div>

        <button class="bg-black text-white px-4 py-2 rounded cursor-pointer">
            Register
        </button>
    </form>

</x-layouts.app>
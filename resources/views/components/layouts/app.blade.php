<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{ $title ?? 'Expense Tracker' }}</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100">

    {{-- Navbar  --}}
    <nav class="bg-white shadow ">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center gap-8">

                    <a href="/" class="font-bold text-xl">
                            Expense Tracker
                    </a>

                    @auth
                        <a
                            href="/"
                            class="{{ request()->is('/')
                                ? 'font-semibold text-black'
                                : 'text-gray-600 hover:text-black' }}"
                        >
                            Dashboard
                        </a>
    
                       <a
                            href="/expenses"
                            class="{{ request()->routeIs('expenses.*')
                                ? 'font-semibold text-black'
                                : 'text-gray-600 hover:text-black' }}"
                        >
                            Expenses
                        </a>
    
                        <a
                            href="/categories"
                            class="{{ request()->routeIs('categories.*')
                                ? 'font-semibold text-black'
                                : 'text-gray-600 hover:text-black' }}"
                        >
                            Categories
                        </a>
                    @endauth

                </div>

                <div 
                   x-data="{ open: false }"
                    @click="open = !open"
                    class="flex items-center gap-4 cursor-pointer"
                >
                    @auth
                        <a href="{{ route('expenses.create')  }}" title="Add Expense" class="rounded px-2 py-1">
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </a>

                        <div class="relative">
                            <div class="flex items-center gap-2">

                                <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>

                                <button
                                    class="rounded px-1 py-1 cursor-pointer"
                                >
                                    <svg
                                        :class="{ 'rotate-180': open }"
                                        class="size-5 transition-transform"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5"
                                        />
                                    </svg>
                                </button>

                            </div>

                            <div
                                x-show="open"
                                @click.outside="open = false"
                                x-transition
                                class="absolute right-0 mt-2 w-48 rounded-md bg-white shadow-lg border"
                            >
                                <div class="p-3 border-b">
                                    <p class="font-medium">
                                        {{ auth()->user()->name }}
                                    </p>
                                </div>

                                <div class="p-2">
                                    <x-logout-btn />
                                </div>
                            </div>

                        </div>

                    @endauth

                    @guest
                        <a href="/login">Login</a>
                        <a href="/register">Register</a>
                    @endguest

                </div>

            </div>

        </div>
    </nav>

    {{-- main content  --}}
    <main class="max-w-4xl mx-auto p-6">

        <x-flash-message :type="'success'">
            {{ session('success') }}
        </x-flash-message>

        <x-flash-message :type="'error'">
            {{ session('error') }}
        </x-flash-message>

        {{ $slot }}
    </main>

</body>

</html>
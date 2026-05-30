<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{ $title ?? 'Expense Tracker' }}</title>
</head>

<body class="bg-gray-100">

    <nav class="bg-white shadow p-4">
        <div class="max-w-4xl mx-auto flex justify-between">
            <a href="/">
                Expense Tracker
            </a>

            <div class="flex gap-4">

                @auth

                    <a href="/expenses" class="text-gray-700 hover:text-gray-900">
                        Expenses
                    </a>

                    <a href="/categories" class="text-gray-700 hover:text-gray-900">
                        Categories
                    </a>

                    <a href="{{ route('expenses.create')  }}" class="bg-black text-white rounded px-2 py-1">
                        Add Expense +
                    </a>

                    <span>
                        Hello {{ auth()->user()->name }}
                    </span>

                    <form method="POST" action="/logout">
                        @csrf

                        <button>
                            Logout
                        </button>
                    </form>
                @endauth

                @guest
                    <a href="/login">Login</a>
                    <a href="/register">Register</a>
                @endguest

            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto p-6">
        {{ $slot }}
    </main>

</body>

</html>
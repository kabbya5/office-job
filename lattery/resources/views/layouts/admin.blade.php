<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
    body {
        background: var(--bg-dark);
        color: var(--text);
    }

    .card {
        background: var(--bg-card);
        border: 1px solid var(--border);
    }

    .sidebar {
        transition: transform 0.3s ease;
    }

    .sidebar-link:hover {
        background: rgba(245,197,66,0.08);
    }
    </style>

    @stack("style")
</head>

<body class="flex">

<!-- OVERLAY (mobile) -->
<div id="overlay"
     class="fixed inset-0 bg-black/60 hidden z-40"
     onclick="toggleSidebar()"></div>


    <aside id="sidebar"
        class="sidebar fixed md:static z-50 w-64 h-screen p-5 border-r transform -translate-x-full md:translate-x-0"
        style="border-color: var(--border); background: var(--bg-dark);">

        <h1 class="text-2xl font-bold mb-6" style="color: var(--primary);">
            🎰 Casino Admin
        </h1>

        <nav class="space-y-2 text-sm">
            <a class="block p-2 rounded sidebar-link" href="{{route('admin.dashboard')}}">Dashboard</a>
            <a href="{{route("admin.country.index")}}" class="block p-2 rounded sidebar-link"> Country </a>
            <a class="block p-2 rounded sidebar-link" href="#">Users</a>
            <a class="block p-2 rounded sidebar-link" href="#">Bets</a>
            <a class="block p-2 rounded sidebar-link" href="#">Transactions</a>
            <a href="{{route("admin.categories.index")}}" class="block p-2 rounded sidebar-link"> Category </a>
            <a class="block p-2 rounded sidebar-link" href="#">Games</a>
            <a class="block p-2 rounded sidebar-link" href="#">Settings</a>
        </nav>

        <div class="mt-10 text-xs text-gray-500">
            System Status: <span class="text-green-400">Online</span>
        </div>
    </aside>


    <main class="flex-1 p-6 space-y-6">

        <!-- TOP BAR -->
        <div class="flex items-center justify-between">

            <!-- Mobile menu button -->
            <button onclick="toggleSidebar()"
                class="md:hidden px-3 py-2 rounded"
                style="background: var(--primary); color: #000;">
                ☰
            </button>

            <h2 class="text-xl font-semibold">Dashboard</h2>

            <button class="px-4 py-2 rounded font-semibold"
                style="background: var(--primary); color:#000;">
                + New Game
            </button>
        </div>
        <div class="border-primary p-4">
            @yield('content')
        </div>
    </main>
</div>

<script src="{{ asset('assets/js/jquery-4.0.0.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
@stack('js')

<script>
    $(document).on('change', 'input[type="file"]', function() {
        var input = this;
        var reader = new FileReader();
        
        reader.onload = function(e) {
            $(input).siblings('.image-preview').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
    });
</script>

</body>
</html>
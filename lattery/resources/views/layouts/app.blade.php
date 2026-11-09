<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack("style")
</head>

<body class="bg-gray-100 text-gray-900">

<div id="app-content">

    <!-- NAVBAR -->
<nav class="flex justify-between items-center px-8 py-3 border-b border-yellow-500/20">
    <h1 class="text-2xl font-bold text-yellow-400">CasinoPro</h1>

    <div class="space-x-6 hidden md:flex">
        <a href="{{route('admin.dashboard')}}" class="hover:text-yellow-400">Dashboard</a>
        <a href="#" class="hover:text-yellow-400">Home</a>
        <a href="#" class="hover:text-yellow-400">Games</a>
        <a href="#" class="hover:text-yellow-400">Promotions</a>
        <a href="#" class="hover:text-yellow-400">Support</a>
    </div>

    @guest
   <div class="flex items-center space-x-3">

    <!-- Login -->
    <a href="/login"
       class="relative px-5 py-2 rounded-lg font-semibold text-white 
              bg-gradient-to-r from-blue-600 to-indigo-600 
              hover:from-blue-500 hover:to-indigo-500 
              shadow-md hover:shadow-blue-500/40 
              transition-all duration-300">

        Login
    </a>

    <!-- Register -->
    <a href="/register"
       class="relative px-5 py-2 rounded-lg font-semibold text-black 
              bg-gradient-to-r from-yellow-400 to-yellow-500 
              hover:from-yellow-300 hover:to-yellow-400 
              shadow-md hover:shadow-yellow-500/40 
              transition-all duration-300">

        Register
    </a>

</div>
   
    @else
        <!-- LOGGED IN USER -->
        <a href="{{route('user.profile')}}" class="flex items-center space-x-3 bg-[#141b2d] px-4 py-2 rounded-lg">

            <!-- User Icon -->
            <i class="fa-solid fa-user text-yellow-400"></i>

            <!-- Balance -->
            <span class="text-green-400 font-bold">
                {{auth()->user()->country->currency_symbol}} {{ Auth::user()->wallet->total_amount ?? 0 }}
            </span>

        </a>
    @endguest
</nav>

    <!-- Page Content -->
    <main class="p-6">
        @yield('content')
    </main>

</div>
<script src="{{ asset('assets/js/jquery-4.0.0.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
@yield('js')
</body>
</html>